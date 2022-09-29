@extends('layouts.quality')
@section('title')
    {{ 'Всички Фирми' }}
@endsection

@section('css')
    {!!Html::style("css/firms_objects/firms_all_css.css" )!!}
    {!!Html::style("css/table/jquery.dataTables.css" )!!}
    {!!Html::style("css/table/table_firms.css " )!!}
@endsection

@section('message')
    @include('layouts.alerts.success')
@endsection

@section('content')
    <div class="div-layout-title" style="margin-bottom: 20px; margin-top: 20px">
        <h4 class="bold layout-title">ВСИЧКИ ТЪРГОВЦИ</h4>
    </div>
    <hr/>
    <div class="btn-group" >
        <a href="/" class="fa fa-home btn btn-info my_btn"> Началo</a>
        <a href="{!! URL::to('/контрол/сертификати')!!}" class="fa fa-certificate btn btn-info my_btn"> Сертификати</a>
        <span class="fa fa-truck btn btn-default my_btn"> Всички търговци</span>
        <a href="{!! URL::to('/контрол/култури')!!}" class="fa fa-leaf btn btn-info my_btn"> Всички култури</a>
    </div>
    <div class="btn_add_firm">
        <a href="{!!URL::to('/контрол/търговци/добави')!!}" class="fa fa-arrow-circle-right btn btn-danger my_btn"> Добави НОВА фирма</a>
    </div>
    <hr/>
    <fieldset class="form-group">
        <div class="wrap_sort">
            <div id="wr_choiz_all">
                <div  id="sort_firm"  style="justify-content: center">
                    {!! Form::open(['url'=>'/контрол/търговци/сортирай', 'method'=>'POST']) !!}

                    <div class="row">
                        <div class="col-md-4">
                            <?php
                                if (isset($input_sort) ) {
                                    if ($input_sort == 0) {
                                        $cs0 =true;
                                        $cs1 =false;
                                        $cs999 =false;
                                    }
                                    elseif($input_sort == 1) {
                                        $cs0 =false;
                                        $cs1 =true;
                                        $cs999 =false;
                                    }
                                    elseif ($input_sort == 999) {
                                        $cs0 =false;
                                        $cs1 =false;
                                        $cs999 =true;
                                    }
                                    else {
                                        $cs0 =false;
                                        $cs1 =false;
                                        $cs999 =false;
                                    }
                                }
                                else {
                                    $cs0 =false;
                                    $cs1 =false;
                                    $cs999 =false;
                                }
                            ?>
                            <label><span>&nbsp;&nbsp;Български: </span>
                                {!! Form::radio('sort', 0, $cs0 ) !!}&nbsp;&nbsp;|
                            </label>
                            <label><span>&nbsp;&nbsp;Чужди: </span>
                                {!! Form::radio('sort', 1, $cs1 ) !!}&nbsp;&nbsp;|
                            </label>
                            <label><span>&nbsp;&nbsp;Всички: </span>
                                {!! Form::radio('sort', 999, $cs999 ) !!}
                            </label>
                        </div>
                        <div class="col-md-5">
                            <?php
                                if (isset($input_type) ) {
                                    if ($input_type == 0) {
                                        $check0 =true;
                                        $check1 =false;
                                        $check2 =false;
                                        $check999 =false;
                                    }
                                    elseif ($input_type == 1) {
                                        $check0 =false;
                                        $check1 =true;
                                        $check2 =false;
                                        $check999 =false;
                                    }
                                    elseif ($input_type == 2) {
                                        $check0 =false;
                                        $check1 =false;
                                        $check2 =true;
                                        $check999 =false;
                                    }
                                    elseif ($input_type == 999) {
                                        $check0 =false;
                                        $check1 =false;
                                        $check2 =false;
                                        $check999 =true;
                                    }
                                    else {
                                        $check0 =false;
                                        $check1 =false;
                                        $check2 =false;
                                        $check999 =false;
                                    }
                                } else {
                                    $check0 =false;
                                    $check1 =false;
                                    $check2 =false;
                                    $check999 =false;
                                }
                            ?>
                            <label><span>&nbsp;&nbsp;Износители: </span>
                                {!! Form::radio('type', 1,$check1 ) !!}&nbsp;&nbsp;|
                            </label>
                            <label><span>&nbsp;&nbsp;Вносители: </span>
                                {!! Form::radio('type', 0, $check0 ) !!}&nbsp;&nbsp;|
                            </label>
                            <label><span>&nbsp;&nbsp;Износители/Вносители: </span>
                                {!! Form::radio('type', 2, $check2 ) !!}&nbsp;&nbsp;|
                            </label>
                            <label><span>&nbsp;&nbsp;Всички: </span>
                                {!! Form::radio('type', 999, $check999) !!}
                            </label>
                        </div>
                        <div class="col-md-3">
                            {!! Form::hidden('_token', csrf_token() ) !!}
                            {!! Form::submit('Сортирай!',['class'=>'fa btn btn-success my_btn']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </fieldset>
    <hr/>
    <div class="refresh">
        <a href="{{ url('/контрол/търговци') }}" class="fa fa-eraser btn btn-primary my_btn">&nbsp; Изчисти сортирането!</a>
    </div>
    {{--<hr/>--}}
    @include('quality.importers.table')
@endsection

@section('scripts')
    {!!Html::script("js/table/jquery-1.11.3.min.js" )!!}
    {!!Html::script("js/table/jquery.dataTables.js" )!!}
    {!!Html::script("js/table/firmsImportersTable.js" )!!}
@endsection