<?php

namespace odbh\Http\Controllers;

use Illuminate\Http\Request;

use odbh\Crop;
use odbh\Http\Requests;
//use odbh\Http\Controllers\Controller;
use odbh\Importer;
use odbh\QCertificate;
use odbh\Set;
use odbh\Country;
use odbh\User;
use Auth;
use odbh\Http\Requests\QCertificatesRequest;

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

//        $certificates = QCertificate::get();

//        return view('quality.certificates.index', compact( 'certificates' ));
        return view('quality.certificates.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $index = $this->index;

//        $last_number = QCertificate::select('number_certificate')
//            ->orderBy('number_certificate', 'desc')
//            ->limit(1)->get()->toArray();

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

        $name_text = $user[0]['all_name'];;
        $count = str_word_count($name_text, 0, 'АБВГДЕЁЖЗИЙКЛМНОПРСТУФХЦЧШЩЪЫЬЭЮЯабвгдеёжзийклмнопрстуфхцчшщъыьэюя');
       
        

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
        dd($request->all());
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
