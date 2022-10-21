@extends('layouts.quality')

@section('title')
    {{ 'Стоки Внос' }}
@endsection

@section('css')
    {!!Html::style("css/firms_objects/firms_all_css.css" )!!}
    {!!Html::style("css/table/jquery.dataTables.css" )!!}
    {!!Html::style("css/table/table_firms.css" )!!}
    {!!Html::style("css/table/crop.css" )!!}
@endsection

@section('message')
    @include('layouts.alerts.success')
@endsection

@section('content')
    <div class="div-layout-title" style="margin-bottom: 20px; margin-top: 20px">
        <h4 class="bold layout-title">СТОКИ ВНОС</h4>
    </div>
    <hr/>
    <div class="btn-group" >
        <a href="/" class="fa fa-home btn btn-info my_btn"> Началo</a>
        <a href="{!! URL::to('/контрол/сертификати')!!}" class="fa fa-certificate btn btn-info my_btn"> Сертификати</a>
        <a href="{!! URL::to('/контрол/фактури')!!}" class="fa fa-files-o btn btn-info my_btn"> Фактури</a>
        <a href="{!! URL::to('/контрол/търговци')!!}" class="fa fa-trademark btn btn-info my_btn"> Всички фирми</a>
        <span class="fa fa-leaf btn btn-default my_btn"> Стоки/Култури</span>
    </div>
    <div class="btn_add_firm">
        <a href="{!!URL::to('/контрол/култури/create')!!}" class="fa fa-arrow-circle-right btn btn-danger my_btn"> Добави култура</a>
    </div>
    <hr/>
    <div class="btn-group" >
        <span class="fa fa-tags btn btn-default my_btn"> Стоки </span>
        <a href="{!! URL::to('/контрол/култури')!!}" class="fa fa-leaf btn btn-info my_btn"> Култури</a>
    </div>
    <hr/>
    <fieldset class="form-group">
        <div class="wrap_sort">
            <div id="wr_choiz_all">
                <div  id="sort_miar_wrap"  style="justify-content: center">
                    <h3>Стоки внос</h3>
                </div>
            </div>
        </div>
    </fieldset>
    <hr/>
    @include('quality.certificates.includes.stock_table')

@endsection