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
use Input;

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
     * @return \Illuminate\Http\Response
     * @internal param null $type
     * @internal param null $sort
     */
    public function index()
    {
        $importers = Importer::orderBy('name_en', 'asc')->where('is_active', '=', '1')->get();

        return view('quality.importers.index', compact( 'importers'));
    }

    /**
     * Sort firms by different types.
     *
     * @param null $sort
     * @param null $type
     * @return \Illuminate\Http\Response
     * @internal param null $type
     */
    public function sort($sort = null, $type = null)
    {

        $input_sort = Input::get('sort');
        $input_type = Input::get('type');

//        dd($input_sort.'---'.$input_type);
        //////// При Избиране
        if($input_sort !== null){
            if($input_sort >= 0){
                $importers = Importer::select()
                    ->where('is_active', '=', '1')
                    ->where('is_bulgarian', '=', $input_sort)->get();
//                $importers_sql = "->where('is_bulgarian', '=', $input_sort)";
                $importers_sql = "->where('is_bulgarian', '=', $input_sort)";
            }
            else{
                $importers_sql = '';
//                $importers = Importer::orderBy('name_en', 'asc')->where('is_active', '=', '1')->get();
            }
        }
      dd($importers_sql);
        $importers = Importer::orderBy('name_en', 'asc')->where('is_active', '=', '1').$importers_sql;
        dd($importers);
        return view('quality.importers.index', compact( 'importers', 'input_sort', 'input_type' ));
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
     * @param Request|ImportersRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImportersRequest $request)
    {
        Importer::create ([
            'is_active'=> 1,
            'is_bulgarian'=> $request['is_bulgarian'],
            'trade'=> $request['trade'],
            'name_bg'=> mb_convert_case  ($request['name_bg'], MB_CASE_TITLE, "UTF-8"),
            'address_bg'=> $request['address_bg'],
            'name_en'=> mb_convert_case  ($request['name_en'], MB_CASE_TITLE),
            'address_en'=> $request['address_en'],
            'vin'=> $request['vin'],
            'created_by'=> Auth::user()->id,
            'date_create' => date('d.m.Y H:i:s', time()) ,
        ]);
    
        Session::flash('message', 'Записа е успешен!');
        return Redirect::to('/контрол/търговци');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $importer  = Importer::findOrFail($id);
        $certificates = $importer->qcertificate;

        foreach($certificates as $certificate){
            $stocks[] = $certificate->stocks->toArray();
        }
        if(!isset($stocks)) {
            $stocks = 0;
        }

        return view('quality.importers.show', compact( 'importer', 'certificates', 'stocks'));
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
     * @param Request|ImportersRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImportersRequest $request, $id)
    {
        $importers = Importer::findOrFail($id);
        $data =([
            'is_active'=> $request['is_active'],
            'is_bulgarian'=> $request['is_bulgarian'],
            'trade'=> $request['trade'],
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
        return Redirect::to('/контрол/търговци');
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
