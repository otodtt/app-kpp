@extends('layouts.quality')
@section('title')
    {{ 'Избери Сертификат' }}
@endsection

@section('css')
    {!!Html::style("css/firms_objects/firms_all_css.css" )!!}
@endsection

@section('message')
    @include('layouts.alerts.success')
@endsection

@section('content')
    <div class="div-layout-title" style="margin-bottom: 20px; margin-top: 20px">
        <h4 class="bold layout-title">ИЗБЕРИ ВИДА СЕРТИФИКАТ</h4>
    </div>
    <hr/>

    <div class="row" style="margin: 0 auto; width: 80%; min-height: 200px; margin-top: 50px">
        <div class="col-md-4">
            <div class="btn_add" style="text-align: center;">
                <a href="{!!URL::to('/контрол/сертификати/вътрешен')!!}" class="fa fa-retweet btn btn-info my_btn disabled">  Вътрешен Сертификат</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="btn_add" style="text-align: center;">
                <a href="{!!URL::to('/контрол/сертификати-внос/добави')!!}" class="fa fa-arrow-circle-right btn btn-danger my_btn ">  Сертификат Внос</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="btn_add" style="text-align: center;">
                <a href="{!!URL::to('/контрол/сертификати-износ/добави')!!}" class="fa fa-arrow-circle-left btn btn-success my_btn disabled">  Сертификат Износ</a>
            </div>
        </div>
    </div>

    <div class="div-layout-title" style="margin-bottom: 20px; margin-top: 20px; text-align: center;">
        <a href="{{ '/контрол/сертификати' }}" class="fa fa-arrow-circle-left btn btn-default my_btn-success"> Откажи! Назад към сертификатите!</a>
    </div>
@endsection
