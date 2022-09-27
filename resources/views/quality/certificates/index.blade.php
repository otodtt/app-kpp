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
        <h4 class="bold layout-title">ВСИЧКИ СЕРТИФИКАТИ</h4>
    </div>
    <hr/>
    <div class="btn-group" >
        <a href="/" class="fa fa-home btn btn-info my_btn"> Началo</a>
        <span class="fa  btn btn-default my_btn"><i class="fa fa-certificate yellow" aria-hidden="true" ></i>  Сертификати</span>
        <a href="{!! URL::to('/контрол/вносители')!!}" class="fa fa-truck btn btn-info my_btn"> Всички вносители</a>
        <a href="{!! URL::to('/контрол/култури')!!}" class="fa fa-leaf btn btn-info my_btn"> Всички култури</a>
    </div>
    <div class="btn_add_firm">
        <a href="{!!URL::to('/контрол/сертификати/добави')!!}" class="fa fa-arrow-circle-right btn btn-danger my_btn"> Добави Сертификат</a>
    </div>
    <hr/>
    <fieldset class="form-group">
        <div class="wrap_sort">
            <div id="wr_choiz_all">
                <div  id="sort_miar_wrap"  style="justify-content: center">
                    <h3>Всички сертификати</h3>
                </div>
            </div>
        </div>
    </fieldset>
    <hr/>
    {{--@include('quality.importers.table')--}}
@endsection

@section('scripts')
    {!!Html::script("js/table/jquery-1.11.3.min.js" )!!}
    {!!Html::script("js/table/jquery.dataTables.js" )!!}
    {!!Html::script("js/table/firmsImportersTable.js" )!!}
@endsection