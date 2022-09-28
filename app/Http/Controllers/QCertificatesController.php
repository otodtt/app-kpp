<?php

namespace odbh\Http\Controllers;

use Illuminate\Http\Request;

use odbh\Crop;
use odbh\Http\Requests;
use odbh\Http\Controllers\Controller;
use odbh\Importer;
use odbh\QCertificate;
use odbh\Set;
use odbh\Country;
use odbh\User;
use Auth;
use odbh\Http\Requests\QCertificatesRequest;
use Redirect;
use Session;

class QCertificatesController extends Controller
{
    private $index = null;

    public function __construct()
    {
        parent::__construct();
        $this->middleware('quality', ['only'=>['create', 'store', 'edit', 'update', 'destroy']]);

        $this->index = Set::select('q_index', 'authority_bg', 'authority_en')->get()->toArray();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $districts_list = $this->districts_list;
//        $districts_list[0] = 'Друга област';

        $certificates = QCertificate::get();

//        return view('quality.certificates.index', compact( 'certificates' ));
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

        $importers = Importer::all(['id', 'name_bg', 'name_en', 'address_en', 'vin'])->toArray();

        $countries= Country::select('id', 'name', 'name_en', 'EC')
            ->where('EC', '=', 1)
            ->orderBy('name', 'asc')->get()->toArray();

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

        $id = Auth::user()->id;
        $user = User::select('id', 'all_name', 'short_name', 'stamp_number')->where('id', '=', $id)->get()->toArray();

        return view('quality.certificates.create_certificate', compact('index', 'importers', 'countries', 'crops', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QCertificatesRequest $request)
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
//        dd($import );
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
            'for_country_more' => $request->for_country_more,
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
            'inspector_en' => $user[0]['all_name'].'-en',
            'stamp_number' => $index[0]['q_index'].'-'.$user[0]['stamp_number'],
            'authority_bg' => $index[0]['authority_bg'],
            'authority_en' => $index[0]['authority_en'],
            'date_add' => date('d.m.Y', time()),
            'added_by' => Auth::user()->id,
        ];
//        dd($data);
        QCertificate::create($data);
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


    public function test()
    {
        return view('quality.certificates.test');
    }

}
