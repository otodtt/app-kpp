@extends('layouts.quality')
@section('title')
    {{ 'Всички Фактури' }}
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
        <h4 class="bold layout-title">ВСИЧКИ ФАКТУРИ</h4>
    </div>
    <hr/>
    <div class="btn-group" >
        <a href="/" class="fa fa-home btn btn-info my_btn"> Началo</a>
        <a href="{!! URL::to('/контрол/сертификати')!!}" class="fa fa-certificate btn btn-info my_btn"> Сертификати</a>
        <span class="fa fa-files-o btn btn-default my_btn"> Фактури</span>
        <a href="{!! URL::to('/контрол/търговци')!!}" class="fa fa-truck btn btn-info my_btn"> Всички търговци</a>
        <a href="{!! URL::to('/контрол/култури')!!}" class="fa fa-leaf btn btn-info my_btn"> Всички култури</a>
    </div>
    {{--<div class="btn_add_firm">--}}
        {{--<a href="{!!URL::to('/контрол/търговци/добави')!!}" class="fa fa-arrow-circle-right btn btn-danger my_btn"> Добави НОВА фирма</a>--}}
    {{--</div>--}}
    <hr/>
    <fieldset class="form-group">
        <div class="wrap_sort">
            <div id="wr_choiz_all">
                <div  id="sort_firm"  style="justify-content: center">
                    {!! Form::open(['url'=>'/контрол/фактури/сортирай', 'method'=>'POST']) !!}

                    <div class="row">
                        <div class="col-md-3">
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
                                {!! Form::radio('sort', 1, $cs1 ) !!}
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
        <a href="{{ url('/контрол/фактури') }}" class="fa fa-eraser btn btn-primary my_btn">&nbsp; Изчисти сортирането!</a>
    </div>
    {{--<hr/>--}}
    @include('quality.invoices.table')
@endsection

@section('scripts')
    {!!Html::script("js/table/jquery-1.11.3.min.js" )!!}
    {!!Html::script("js/table/jquery.dataTables.js" )!!}
    {!!Html::script("js/quality/invoiceTable.js" )!!}
@endsection