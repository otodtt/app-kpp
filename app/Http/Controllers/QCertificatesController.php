<?php

namespace odbh\Http\Controllers;

use Illuminate\Http\Request;
use odbh\Http\Requests\QCertificatesRequest;
use odbh\Http\Requests\StocksRequest;

use odbh\Crop;
use odbh\Stock;
use odbh\Http\Requests;
use odbh\Http\Controllers\Controller;
use odbh\Importer;
use odbh\QCertificate;
use odbh\Set;
use odbh\Country;
use odbh\User;
use Auth;
use Redirect;
use Session;

class QCertificatesController extends Controller
{
    private $index = null;

    public function __construct()
    {
        parent::__construct();
        $this->middleware('quality', ['only'=>['create', 'store', 'edit', 'update', 'choose', 'create_import']]);
        

        $this->index = Set::select('q_index', 'authority_bg', 'authority_en')->get()->toArray();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates = QCertificate::get();

        return view('quality.certificates.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $index = $this->index;

        $importers = Importer::select(['id', 'name_bg', 'name_en', 'address_en', 'vin', 'trade'])
                                    ->where('is_active', '=', 1)
                                    ->where('trade', '=', 0)
                                    ->orWhere('trade', '=', 2)
                                    ->get()->toArray();

        $countries= Country::select('id', 'name', 'name_en', 'EC')->where('EC', '=', 1)->orderBy('name', 'asc')->get()->toArray();

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

        $last_internal = QCertificate::select('internal')->orderBy('internal', 'desc')->limit(1)->get()->toArray();
        $last_import = QCertificate::select('import')->orderBy('import', 'desc')->limit(1)->get()->toArray();
        $last_export = QCertificate::select('export')->orderBy('export', 'desc')->limit(1)->get()->toArray();

        $id = Auth::user()->id;
        $user = User::select('id', 'all_name', 'short_name', 'stamp_number')->where('id', '=', $id)->get()->toArray();

        return view('quality.certificates.create_certificate', compact('index', 'importers', 'countries', 'crops', 'user',
                    'last_internal', 'last_import', 'last_export'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $index = $this->index;
        $user = User::select('id', 'all_name', 'short_name', 'stamp_number')->where('id', '=', Auth::user()->id)->get()->toArray();

        $last_internal = QCertificate::select('internal')->orderBy('internal', 'desc')->limit(1)->get()->toArray();
        $last_import = QCertificate::select('import')->orderBy('import', 'desc')->limit(1)->get()->toArray();
        $last_export = QCertificate::select('export')->orderBy('export', 'desc')->limit(1)->get()->toArray();

        if( $request->what_7 == 1) {
            if ( $last_internal[0]['internal'] == null) {
                $internal = 1001;
            } else {
                $internal = $last_internal[0]['internal']+ 1;
            }
        } else {
            $internal = '';
        }
        if( $request->what_7 == 2) {
            if ( $last_import[0]['import'] == null) {
                $import = 2001;
            } else {
                $import = $last_import[0]['import'] + 1;
            }
        } else {
            $import = '';
        }

        if( $request->what_7 == 3) {
            if ( $last_export[0]['export'] == null) {
                $export = 3001;
            } else {
                $export = $last_export[0]['export'] + 1;
            }
        } else {
            $export = '';
        }

        $data = [
            'internal' => $internal,
            'import' => $import,
            'export' => $export,
            'what_7' => $request->what_7,
            'type_crops' => $request->type_crops,
            'importer_id' => $request->importer_data,
            'importer_name' => $request->en_name,
            'importer_address' => $request->en_address,
            'importer_vin' => $request->vin_hidden,
            'packer_name' => $request->packer_name,
            'packer_address' => $request->packer_address,
            'from_country' => $request->from_country,
            'id_country' => $request->id_country,
            'for_country_bg' => $request->for_country_bg,
            'for_country_en' => $request->for_country_en,
            'observations' => $request->observations,
            'transport' => $request->transport,
            'customs_bg' => $request->customs_bg,
            'customs_en' => $request->customs_en,
            'place_bg' => $request->place_bg,
            'place_en' => $request->place_en,
            'date_issue' => date('d.m.Y', time()),
            'valid_until' => $request->valid_until,
            'invoice' => $request->invoice,
            'date_invoice' => $request->date_invoice,
            'inspector_bg' => $user[0]['all_name'],
            'inspector_en' => $user[0]['all_name_en'],
            'stamp_number' => $index[0]['q_index'].'-'.$user[0]['stamp_number'],
            'authority_bg' => $index[0]['authority_bg'],
            'authority_en' => $index[0]['authority_en'],
            'date_add' => date('d.m.Y', time()),
            'added_by' => Auth::user()->id,
        ];

        QCertificate::create($data);
        Session::flash('message', 'Записа е успешен!');
        return Redirect::to('/контрол/сертификати');


    }

    /** ВНОС НАЧАЛО////////////////
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import_create()
    {
        $type = 1;
        $edit = 0;
        $index = $this->index;
        $importers = Importer::select(['id', 'name_bg', 'name_en', 'address_en', 'vin', 'trade'])
                                    ->where('is_active', '=', 1)
                                    ->where('trade', '=', 0)
                                    ->orWhere('trade', '=', 2)
                                    ->get()->toArray();

        $countries= Country::select('id', 'name', 'name_en', 'EC')->where('EC', '=', 1)->orderBy('name', 'asc')->get()->toArray();

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

       
        $last_import = QCertificate::select('import')->orderBy('import', 'desc')->limit(1)->get()->toArray();

        $id = Auth::user()->id;
        $user = User::select('id', 'all_name' , 'all_name_en', 'short_name', 'stamp_number')->where('id', '=', $id)->get()->toArray();

        if(!empty($last_import)) {
            $last_number = $last_import;
        } else {
            $last_number[0]['import'] = '2001';
        }

        return view('quality.certificates.import.import_certificate', compact('index', 'importers', 'countries', 'crops', 'user', 'last_number', 'type', 'edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \odbh\Http\Requests\QCertificatesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function import_store(QCertificatesRequest $request)
    {
        
        $index = $this->index;
        $user = User::select('id', 'all_name', 'all_name_en', 'short_name', 'stamp_number')->where('id', '=', Auth::user()->id)->get()->toArray();

        $last_import = QCertificate::select('import')->orderBy('import', 'desc')->limit(1)->get()->toArray();

        if(!empty($last_import)) {
            $import = $last_import[0]['import'] + 1;
        } else {
            $import = '2001';
        }

        $data = [
            'import' => $import,
            'what_7' => 2,
            'type_crops' => $request->type_crops,
            'importer_id' => $request->importer_data,
            'importer_name' => $request->en_name,
            'importer_address' => $request->en_address,
            'importer_vin' => $request->vin_hidden,
            'packer_name' => $request->packer_name,
            'packer_address' => $request->packer_address,
            'from_country' => $request->from_country,
            'id_country' => $request->id_country,
            'for_country_bg' => $request->for_country_bg,
            'for_country_en' => $request->for_country_en,
            'observations' => $request->observations,
            'transport' => $request->transport,
            'customs_bg' => $request->customs_bg,
            'customs_en' => $request->customs_en,
            'place_bg' => $request->place_bg,
            'place_en' => $request->place_en,
            'date_issue' => time(),
            'valid_until' => $request->valid_until,
            'invoice' => $request->invoice,
            'date_invoice' => $request->date_invoice,
            'sum' => $request->sum,
            'inspector_bg' => $user[0]['all_name'],
            'inspector_en' => $user[0]['all_name_en'],
            'stamp_number' => $index[0]['q_index'].'-'.$user[0]['stamp_number'],
            'authority_bg' => $index[0]['authority_bg'],
            'authority_en' => $index[0]['authority_en'],
            'date_add' => date('d.m.Y', time()),
            'added_by' => Auth::user()->id,
        ];
        QCertificate::create($data);

        $last_id = QCertificate::select('id')->orderBy('id', 'desc')->limit(1)->get()->toArray();
        
        Session::flash('message', 'Записа е успешен!');
        return Redirect::to('/контрол/сертификат-внос/'.$last_id[0]['id'] .'/завърши');


    }
    public function import_ending($id)
    {
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
        
        return view('quality.certificates.import.stock_import', compact('id', 'crops', 'certificate', 'stocks'));
       
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function import_stock_store(StocksRequest $request)
    {
        $data = [
            'certificate_id' => $request->certificate_id,
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
        // return back();
        return Redirect::to('/import/stock/'.$stock->certificate_id.'/0/edit');
    }

    public function import_finish(Request $request)
    {
        $certificate = QCertificate::findOrFail($request->certificate_id);
        $data = [
            'is_all' => $request->certificate_id,
        ];
        $certificate->fill($data);
        $certificate->save();
        
        Session::flash('message', 'Записа е успешен!');
        return Redirect::to('/контрол/сертификат/'.$request->certificate_id);
    }
    /** ВНОС КРАЙ//////////////// */


    /** ИЗНОС /////////////////
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function export_create()
    {
        $type = 2;
        $index = $this->index;
        $importers = Importer::select(['id', 'name_bg', 'name_en', 'address_en', 'vin', 'trade'])
                                    ->where('is_active', '=', 1)
                                    ->where('trade', '=', 0)
                                    ->orWhere('trade', '=', 2)
                                    ->get()->toArray();

        $countries= Country::select('id', 'name', 'name_en', 'EC')->where('EC', '=', 1)->orderBy('name', 'asc')->get()->toArray();

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

       
        $last_import = QCertificate::select('import')->orderBy('import', 'desc')->limit(1)->get()->toArray();

        $id = Auth::user()->id;
        $user = User::select('id', 'all_name', 'all_name_en', 'short_name', 'stamp_number')->where('id', '=', $id)->get()->toArray();

        if(!empty($last_import)) {
            $last_number = $last_import;
        } else {
            $last_number[0]['import'] = '2001';
        }

        return view('quality.certificates.export.export_certificate', compact('index', 'importers', 'countries', 'crops', 'user', 'last_number', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \odbh\Http\Requests\QCertificatesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function export_store(QCertificatesRequest $request)
    {
        
        $index = $this->index;
        $user = User::select('id', 'all_name', 'short_name', 'stamp_number')->where('id', '=', Auth::user()->id)->get()->toArray();

        $last_import = QCertificate::select('import')->orderBy('import', 'desc')->limit(1)->get()->toArray();

        if(!empty($last_import)) {
            $import = $last_import[0]['import'] + 1;
        } else {
            $import = '2001';
        }

        $data = [
            'import' => $import,
            'what_7' => 2,
            'type_crops' => $request->type_crops,
            'importer_id' => $request->importer_data,
            'importer_name' => $request->en_name,
            'importer_address' => $request->en_address,
            'importer_vin' => $request->vin_hidden,
            'packer_name' => $request->packer_name,
            'packer_address' => $request->packer_address,
            'from_country' => $request->from_country,
            'id_country' => $request->id_country,
            'for_country_bg' => $request->for_country_bg,
            'for_country_en' => $request->for_country_en,
            'observations' => $request->observations,
            'transport' => $request->transport,
            'customs_bg' => $request->customs_bg,
            'customs_en' => $request->customs_en,
            'place_bg' => $request->place_bg,
            'place_en' => $request->place_en,
            'date_issue' => time(),
            'valid_until' => $request->valid_until,
            'invoice' => $request->invoice,
            'date_invoice' => $request->date_invoice,
            'sum' => $request->sum,
            'inspector_bg' => $user[0]['all_name'],
            'inspector_en' => $user[0]['all_name'].'-en',
            'stamp_number' => $index[0]['q_index'].'-'.$user[0]['stamp_number'],
            'authority_bg' => $index[0]['authority_bg'],
            'authority_en' => $index[0]['authority_en'],
            'date_add' => date('d.m.Y', time()),
            'added_by' => Auth::user()->id,
        ];
        dd($data );

        // QCertificate::create($data);
        Session::flash('message', 'Записа е успешен!');
        return Redirect::to('/контрол/сертификати');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $certificate = QCertificate::findOrFail($id);
        $stocks = $certificate->stocks->toArray();
        $firm = Importer::findOrFail($certificate->importer_id);
        
        return view('quality.certificates.show', compact('certificate', 'stocks', 'firm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = 1;
        $index = $this->index;
        $certificate = QCertificate::findOrFail($id);
        $importers = Importer::select(['id', 'name_bg', 'name_en', 'address_en', 'vin', 'trade'])
                                    ->where('is_active', '=', 1)
                                    ->where('trade', '=', 0)
                                    ->orWhere('trade', '=', 2)
                                    ->get()->toArray();

        $id = Auth::user()->id;
        $user = User::select('id', 'all_name' , 'all_name_en', 'short_name', 'stamp_number')->where('id', '=', $id)->get()->toArray();
        $last_number = QCertificate::select('import')->orderBy('import', 'desc')->limit(1)->get()->toArray();
        $countries = Country::select('id', 'name', 'name_en', 'EC')->where('EC', '=', 1)->orderBy('name', 'asc')->get()->toArray();
        $lock = $certificate->is_lock;

        return view('quality.certificates.import.import_edit_certificate', compact('type', 'certificate', 'importers', 'index', 'countries', 'lock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QCertificatesRequest $request, $id)
    {
        $certificate = QCertificate::findOrFail($id);
        $data = [
            'type_crops' => $request->type_crops,
            'importer_id' => $request->importer_data,
            'importer_name' => $request->en_name,
            'importer_address' => $request->en_address,
            'importer_vin' => $request->vin_hidden,
            'packer_name' => $request->packer_name,
            'packer_address' => $request->packer_address,
            'from_country' => $request->from_country,
            'id_country' => $request->id_country,
            'for_country_bg' => $request->for_country_bg,
            'for_country_en' => $request->for_country_en,
            'observations' => $request->observations,
            'transport' => $request->transport,
            'customs_bg' => $request->customs_bg,
            'customs_en' => $request->customs_en,
            'place_bg' => $request->place_bg,
            'place_en' => $request->place_en,
            'valid_until' => $request->valid_until,
            'invoice' => $request->invoice,
            'date_invoice' => $request->date_invoice,
            'sum' => $request->sum,
            'date_update' => date('d.m.Y', time()),
            'updated_by' => Auth::user()->id,
        ];
        
        $certificate->fill($data);
        $certificate->save();

        Session::flash('message', 'Сертификата е редактиран успешно!');
        return Redirect::to('/контрол/сертификат/'.$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function stocks_edit($id, $sid) {
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::find($id);
        $stock->delete();
        return back();
    }

    /**
     * Избор на сертификат.
     *
     * @return \Illuminate\Http\Response
     */
    public function choose()
    {
        return view('quality.certificates.choose');
    }


    public function test()
    {
        return view('quality.certificates.test');
    }

}
