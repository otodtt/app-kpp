<?php

namespace odbh\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use odbh\Http\Requests;
use odbh\Http\Controllers\Controller;
use odbh\Set;
use odbh\Http\Requests\ImportersRequest;
use odbh\Importer;
use Auth;
use Session;

class ImportersController extends Controller
{

    private $index = null;

    public function __construct()
    {
        parent::__construct();
        $this->middleware('quality', ['only'=>['create', 'store', 'edit', 'update', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts_list = $this->districts_list;
        $districts_list[0] = 'Друга област';

        $importers = Importer::orderBy('name_en', 'asc')->where('is_active', '=', '1')->get();

        return view('quality.importers.index', compact( 'importers', 'districts_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quality.importers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImportersRequest $request)
    {
        Importer::create ([
            'is_active'=> 1,
            'is_bulgarian'=> $request['is_bulgarian'],
            'name_bg'=> mb_convert_case  ($request['name_bg'], MB_CASE_TITLE, "UTF-8"),
            'address_bg'=> $request['address_bg'],
            'name_en'=> mb_convert_case  ($request['name_en'], MB_CASE_TITLE),
            'address_en'=> $request['address_en'],
            'vin'=> $request['vin'],
            'created_by'=> Auth::user()->id,
            'date_create' => date('d.m.Y H:i:s', time()) ,
        ]);
    
        Session::flash('message', 'Записа е успешен!');
        return Redirect::to('/контрол/вносители');
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
        $importers = Importer::findOrFail($id);
        return view('quality.importers.edit', compact('importers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImportersRequest $request, $id)
    {
        $importers = Importer::findOrFail($id);
        $data =([
            'is_active'=> $request['is_active'],
            'is_bulgarian'=> $request['is_bulgarian'],
            'name_bg'=> mb_convert_case  ($request['name_bg'], MB_CASE_TITLE, "UTF-8"),
            'address_bg'=> $request['address_bg'],
            'name_en'=> mb_convert_case  ($request['name_en'], MB_CASE_TITLE),
            'address_en'=> $request['address_en'],
            'vin'=> $request['vin'],
            'updated_by'=> Auth::user()->id,
            'date_update' => date('d.m.Y H:i:s', time()) ,
        ]);
        

        $importers->fill($data);
        $importers->save();

        Session::flash('message', 'Фирмата е редактирана успешно!');
        return Redirect::to('/контрол/вносители');
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
