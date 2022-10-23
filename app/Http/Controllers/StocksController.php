<?php

namespace odbh\Http\Controllers;

use Illuminate\Http\Request;

use odbh\Http\Requests;
use odbh\Http\Controllers\Controller;
use odbh\Stock;
use odbh\QCertificate;
use odbh\Http\Requests\StocksRequest;
use odbh\User;
use odbh\Crop;
use odbh\Set;
use Auth;
use odbh\Importer;
use Redirect;
use Session;


class StocksController extends Controller
{
    private $index = null;

    public function __construct()
    {
        parent::__construct();
        $this->middleware('quality', ['only'=>['create', 'store', 'edit', 'update', 'choose', 'create_import']]);
        

        $this->index = Set::select('q_index', 'authority_bg', 'authority_en')->get()->toArray();
    }

    /**
     * СПИСЪК СЪС СТОКИТЕ
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function import_index()
    {
        $stocks = Stock::where('import', '>', 0)->orderBy('certificate_id', 'asc')->get();
        $list = Stock::orderBy('crop_id', 'asc')->lists('crops_name', 'crop_id')->toArray();
        $firms = Importer::where('is_active', '=', 1)->where('trade', '=', 0)->lists('name_en', 'id')->toArray();
        $inspectors = User::select('id', 'short_name')
                                        ->where('active', '=', 1)
                                        ->where('ppz','=', 1)
                                        ->where('stamp_number','<', 5000)
                                        ->lists('short_name', 'id')->toArray();
        $inspectors[''] = 'по инспектор';
        $inspectors = array_sort_recursive($inspectors);
        // dd($inspectors);
        return view('quality.stocks.index', compact('stocks', 'list', 'firms', 'inspectors'));
    }

    /**
     * Display the specified resource.
     *
     *
     * @param StocksRequest $request
     * @return Response
     */
    public function import_stock_store(StocksRequest $request)
    {
        $data = [
            'certificate_id' => $request->certificate_id,
            'certificate_number' => $request->certificate_number,
            'firm_id' => $request->firm_id,
            'firm_name' => $request->firm_name,
            'date_issue' => time(),
            'import' => 2,
            'type_pack' => (int)$request->type_package,
            'number_packages' => $request->number_packages,
            'different' => $request->different,
            'crop_id' => $request->crops,
            'crops_name' => $request->crops_name,
            'crop_en' => $request->crop_en,
            'variety' => $request->variety,
            'quality_class' => $request->quality_class,
            'weight' => $request->weight,
            'date_add' => date('d.m.Y', time()),
            'inspector_name' => Auth::user()->short_name,
            'added_by' => Auth::user()->id,
        ];

        Stock::create($data);
        return back();
    }

    public function import_stock_update(StocksRequest $request, $id)
    {
        $stock = Stock::findOrFail($id);

        if ($request->type_package != 999) {
            $different = '';
        } else {
            $different = $request->different;
        }
        $data = [
            'type_pack' => (int)$request->type_package,
            'number_packages' => $request->number_packages,
            'different' => $different,
            'crop_id' => $request->crops,
            'crops_name' => $request->crops_name,
            'crop_en' => $request->crop_en,
            'variety' => $request->variety,
            'quality_class' => $request->quality_class,
            'weight' => $request->weight,
            'date_update' => date('d.m.Y', time()),
            'updated_by' => Auth::user()->id,
        ];
        $stock->fill($data);
        $stock->save();

        return Redirect::to('/import/stock/'.$stock->certificate_id.'/0/edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param $sid
     * @return Response
     */
    public function import_stocks_edit($id, $sid) {
        $qualitys = ['1' => 'I клас/I class', '2' => 'II клас/II class', '3' => 'OПС/GPS'];
        $packages = ['4' => 'Торби/ Bags', '3' => 'Кашони/ C. boxes', '2' => 'Палети/ Cages', '1' => 'Каси/ Pl. cases', '999' => 'ДРУГО'];
        $crops= Crop::select('id', 'name', 'name_en', 'group_id')
            ->where('group_id', '=', 4)
            ->orWhere('group_id', '=', 5)
            ->orWhere('group_id', '=', 6)
            ->orWhere('group_id', '=', 7)
            ->orWhere('group_id', '=', 8)
            ->orWhere('group_id', '=', 9)
            ->orWhere('group_id', '=', 10)
            ->orWhere('group_id', '=', 11)
            ->orWhere('group_id', '=', 15)
            ->orWhere('group_id', '=', 16)
            ->orderBy('group_id', 'asc')->get()->toArray();

        $certificate = QCertificate::findOrFail($id);
        $stocks = $certificate->stocks->toArray();
        $count = count($stocks);
        $lock = $certificate->is_lock;
        if ($sid != 0) {
            $article = Stock::select()->where('id','=', $sid)->where('certificate_id','=', $id)->get()->toArray();
        }
        else {
            $article = 0;
        }
        return view('quality.certificates.import.stock_edit', compact('id', 'crops', 'certificate', 'stocks', 'count', 'lock', 'article', 'qualitys', 'packages' ));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function import_destroy($id)
    {
        $stock = Stock::find($id);
        $stock->delete();
        return back();
    }

    public function import_sort(Request $request, $crop = null ) {

    }

    /**
     * Търси по задедени критерии.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function import_search(Request $request, $type)
    {
        $search_value_return = $request['stock_number'];
        $search_firm_return = $request['search_firm'];

        if($type == 1) {
            $this->validate($request, ['stock_number' => 'required|digits_between:1,4']);
            $stocks = Stock::where('certificate_number', '=', $request['stock_number'])->get();
        }
        if($type == 2) {
            $this->validate($request, ['search_firm' => 'required|not_in:0']);
            $stocks = Stock::where('firm_id', '=', $request['search_firm'])->get();
        }

        $list = Stock::orderBy('crop_id', 'asc')->lists('crops_name', 'crop_id')->toArray();
        $firms = Importer::where('is_active', '=', 1)->where('trade', '=', 0)->lists('name_en', 'id')->toArray();
        
        return view('quality.stocks.index', compact('stocks', 'search_value_return', 'search_firm_return', 'list', 'firms'));
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


}
