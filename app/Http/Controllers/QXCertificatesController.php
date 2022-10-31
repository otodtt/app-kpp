<?php

namespace odbh\Http\Controllers;

use Illuminate\Http\Request;

use odbh\Http\Requests;
use odbh\Http\Controllers\Controller;
use odbh\Http\Requests\QCertificatesRequest;

use odbh\QXCertificate;
use odbh\Crop;
use odbh\Invoice;
use odbh\Packer;
use odbh\Stock;
use odbh\Importer;
use odbh\Set;
use odbh\Country;
use odbh\User;
use Auth;
use Redirect;
use Session;
use DB;
use Input;

class QXCertificatesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('quality', ['only'=>['create', 'store', 'edit', 'update', 'choose', 'create_import', 'import_ending',
            'import_finish', 'import_lock', 'import_unlock']]);


        $this->index = Set::select('q_index', 'authority_bg', 'authority_en')->get()->toArray();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array = array();
        $year_now = null;

        $inspectors = User::select('id', 'short_name')
            ->where('active', '=', 1)
            ->where('ppz','=', 1)
            ->where('stamp_number','<', 5000)
            ->lists('short_name', 'id')->toArray();
        $inspectors[''] = 'по инспектор';
        $inspectors = array_sort_recursive($inspectors);
        $firms = Importer::where('is_active', '=', 1)->where('trade', '=', 0)->lists('name_en', 'id')->toArray();

        if(isset($request['years'])){
            $year_now = $request['years'];
        }
        else{
            $year_now = date('Y', time());
        }
        $start_year = '01.01.'. $year_now;
        $time_start = strtotime(stripslashes($start_year));
        $end_year = '31.12.'. $year_now;
        $time_end = strtotime(stripslashes($end_year));

        $certs = QXCertificate::get();
        foreach($certs as $cert){
            $array[date('Y', $cert->date_issue)] = date('Y', $cert->date_issue);
        }
        $years = array_filter(array_unique($array));

        $certificates = QXCertificate::where('date_issue','>=',$time_start)->where('date_issue','<=',$time_end)->orderBy('is_all', 'asc')->get();

        return view('quality.certificates.export.index', compact('certificates', 'years', 'year_now', 'inspectors', 'firms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = 2;
        $edit = 0;
        $index = $this->index;

        $packers = Packer::select('id', 'packer_name', 'packer_address')->get()->toArray();
        $importers = Importer::select(['id', 'name_bg', 'name_en', 'address_en', 'vin', 'trade'])
            ->where('is_active', '=', 1)
            ->where('trade', '=', 1)
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

        $last_export = QXCertificate::select('export')->orderBy('export', 'desc')->limit(1)->get()->toArray();

        $id = Auth::user()->id;
        $user = User::select('id', 'all_name' , 'all_name_en', 'short_name', 'stamp_number')->where('id', '=', $id)->get()->toArray();

        if(!empty($last_export)) {
            $last_number = $last_export;
        } else {
            $last_number[0]['export'] = '2001';
        }

        return view('quality.certificates.export.export_create_certificate',
            compact('index', 'importers', 'countries', 'crops', 'user', 'last_number', 'type', 'packers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param QCertificatesRequest|Requests\QCertificatesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(QCertificatesRequest $request)
    {
        $index = $this->index;
        $user = User::select('id', 'all_name', 'all_name_en', 'short_name', 'stamp_number')->where('id', '=', Auth::user()->id)->get()->toArray();

        $last_export = QXCertificate::select('export')->orderBy('export', 'desc')->limit(1)->get()->toArray();

        if(!empty($last_export)) {
            $export = $last_export[0]['export'] + 1;
        } else {
            $export = '2001';
        }

        if($request->packer_data == 999  ) {
            $packer_name = $request->packer_name;
            $packer_address = $request->packer_address;
        } else {
            $packer_name = $request->name_of_packer;
            $packer_address = $request->address_of_packer;
        }

        $date_now = time();
        $convert_date = date('d.m.Y', $date_now);
        $final_date = strtotime($convert_date);

        $data = [
            'export' => $export,
            'what_7' => 3,
            'type_crops' => $request->type_crops,
            'importer_id' => $request->importer_data,
            'importer_name' => $request->en_name,
            'importer_address' => $request->en_address,
            'importer_vin' => $request->vin_hidden,
            'packer_id' => $request->packer_data,
            'packer_name' => $packer_name,
            'packer_address' => $packer_address,
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
            'date_issue' => $final_date,
            'valid_until' => $request->valid_until,
            'inspector_bg' => $user[0]['all_name'],
            'inspector_en' => $user[0]['all_name_en'],
            'stamp_number' => $index[0]['q_index'].'-'.$user[0]['stamp_number'],
            'authority_bg' => $index[0]['authority_bg'],
            'authority_en' => $index[0]['authority_en'],
            'date_add' => date('d.m.Y', time()),
            'added_by' => Auth::user()->id,
        ];

        if ($request->packer_data == 999) {
            $data_packer = [
                'packer_name' => $packer_name,
                'packer_address' => $packer_address,
            ];
            Packer::create($data_packer);
        }

        QXCertificate::create($data);

        $last_id = QXCertificate::select('id')->orderBy('id', 'desc')->limit(1)->get()->toArray();

        Session::flash('message', 'Записа е успешен!');
        return Redirect::to('/контрол/сертификат-износ/'.$last_id[0]['id'] .'/завърши');
    }

    public function export_ending($id)
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

        $certificate = QXCertificate::findOrFail($id);
        $stocks = $certificate->export_stocks->toArray();

        return view('quality.certificates.export.stock_export', compact('id', 'crops', 'certificate', 'stocks'));

    }

    public function export_finish(Request $request)
    {
        $certificate = QXCertificate::findOrFail($request->certificate_id);
        $data = [
            'is_all' => 1,
        ];
        $certificate->fill($data);
        $certificate->save();

        Session::flash('message', 'Записа е успешен!');
        return Redirect::to('/контрол/сертификат-износ/'.$request->certificate_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $certificate = QXCertificate::findOrFail($id);
        $stocks = $certificate->export_stocks;
        $firm = Importer::findOrFail($certificate->importer_id);
        $invoice = $certificate->export_invoice->toArray();

        return view('quality.certificates.import.show', compact('certificate', 'stocks', 'firm', 'invoice'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
