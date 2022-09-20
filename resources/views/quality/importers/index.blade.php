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
        <h4 class="bold layout-title">ВСИЧКИ ВНОСИТЕЛИ</h4>
    </div>
    <hr/>
    <div class="btn-group" >
        <a href="/" class="fa fa-home btn btn-info my_btn"> Началo</a>
        <a href="{!! URL::to('/аптеки')!!}" class="fa fa-certificate btn btn-info my_btn"> Сертификати</a>
        <span class="fa fa-truck btn btn-default my_btn"> Всички фирми</span>
        <a href="{!! URL::to('/контрол/култури')!!}" class="fa fa-leaf btn btn-info my_btn"> Всички култури</a>

        {{--<a href="{!! URL::to('/аптеки')!!}" class="fa fa-plus-square btn btn-info my_btn"> Всички аптеки</a>--}}
        {{--<a href="{!! URL::to('/складове')!!}" class="fa fa-shield btn btn-info my_btn"> Всички складове</a>--}}
        {{--<a href="{!! URL::to('/цехове')!!}" class="fa fa-cubes btn btn-info my_btn"> Всички цехове</a>--}}
        {{--<a href="{!!URL::to('/изтекъл-срок')!!}" class="fa fa-times btn btn-info my_btn"> С изтекъл или прекратен срок</a>--}}
    </div>
    <div class="btn_add_firm">
        <a href="{!!URL::to('/контрол/вносители/добави')!!}" class="fa fa-arrow-circle-right btn btn-danger my_btn"> Добави НОВА фирма</a>
    </div>
    <hr/>
    <fieldset class="form-group">
        <div class="wrap_sort">
            <div id="wr_choiz_all">
                <div  id="sort_miar_wrap"  style="justify-content: center">
                    <h3>Всички активни фирми</h3>
                </div>
            </div>
        </div>
    </fieldset>
    <hr/>
    @include('quality.importers.table')
@endsection

@section('scripts')
    {!!Html::script("js/table/jquery-1.11.3.min.js" )!!}
    {!!Html::script("js/table/jquery.dataTables.js" )!!}
    {!!Html::script("js/table/firmsImportersTable.js" )!!}
@endsection