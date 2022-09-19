<?php

namespace odbh\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use odbh\Crop;
use odbh\Http\Requests;
use odbh\Http\Controllers\Controller;
use odbh\Http\Requests\CropsRequest;
use Session;

class CropsController extends Controller
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
        $cultures = Crop::get();
        return view('crops.index', compact('cultures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crops.forms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CropsRequest $request)
    {
        
        $string = $request->latin;
        $insert = preg_replace('/(\w+)/', '-$1', $string);
        $remove= str_replace(' ', '', $insert);
        $first = substr($remove, 1);
        $lower = strtolower($first);

        $data = [
            'name' => $request['name'],
            'group_id' => (int)$request['group_id'],
            'name_en' => $request['name_en'],
            'latin' => $request['latin'],
            'latin_name' => $lower,
            'cropDescription' => $request['cropDescription'],
            'date_create' => date('d.m.Y H:i:s', time()),
            'created_by' => Auth::user()->id,
        ];
        Crop::create($data);
        Session::flash('message', 'Културата е добавена успешно!');
        return Redirect::to('/контрол/култури');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo('ok');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crops = Crop::findOrFail($id);
        return view('crops.forms.edit', compact('crops'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CropsRequest $request, $id)
    {
        $crop = Crop::findOrFail($id);
        $string = $request->latin;
        $insert = preg_replace('/(\w+)/', '-$1', $string);
        $remove= str_replace(' ', '', $insert);
        $first = substr($remove, 1);
        $lower = strtolower($first);

       $data = [
            'name' => $request['name'],
            'group_id' => (int)$request['group_id'],
            'name_en' => $request['name_en'],
            'latin' => $request['latin'],
            'latin_name' => $lower,
            'cropDescription' => $request['cropDescription'],
            'date_update' => date('d.m.Y H:i:s', time()),
            'updated_by' => Auth::user()->id,
        ];
        

        $crop->fill($data);
        $crop->save();

        Session::flash('message', 'Културата е редактирана успешно!');
        return Redirect::to('/контрол/култури');
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
