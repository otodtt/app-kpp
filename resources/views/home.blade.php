@extends('layouts.quality')

@section('title')
    {{ 'ОДБХ Начало' }}
@endsection

@section('css')
    {!!Html::style("css/home.css" )!!}
@endsection

@section('message')
    @include('admin.alerts.success')
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">КОНТРОЛ НА ПРЕСНИ ПЛОДОВЕ И ЗЕЛЕНЧУЦИ</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <fieldset class=""><legend class="">Фирми, Сертификати</legend>
                                    <a class="my_a back_link" href="{!! URL::to( 'контрол/сертификати') !!}"> <i class="fa fa-certificate fa-fw green_color"></i> Издадени сертификати</a><br/>
                                    <a class="my_a back_link" href="{!! URL::to( '/контрол/вносители') !!}"><i class="fa fa-truck fa-fw green_color "></i> Всички фирми доставчици</a><br/>
                                    <a class="my_a back_link" href="{!! URL::to( '/контрол/култури') !!}"><i class="fa fa-leaf fa-fw green_color"></i> Всички култури</a><br/>
                                    <a class="my_a back_link" href="{!! URL::to( '/test') !!}"><i class="fa fa-cubes fa-fw green_color"></i> Тест</a><br/>
                                    <a class="my_a back_link" href="{!! URL::to( '/') !!}"><i class="fa fa-times fa-fw green_color"></i> Тест</a>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class=""><legend class="">Констативни Протоколи и Месечни справки</legend>
                                    <div class="row">

                                        <div class="col-lg-12  ">
                                            <a class="my_a back_link" href="{!! URL::to( '/') !!}"><i class="fa fa-file-powerpoint-o fa-fw control_color"></i> Протоколи Контрол на Пазара</a><br/>
                                            <a class="my_a back_link" href="{!! URL::to( '/') !!}"><i class="fa fa-object-ungroup fa-fw control_color"></i> Протоколи Нерегламентирани Обекти</a><br/>
                                            <a class="my_a back_link" href="{!! URL::to( '/и') !!}"><i class="fa fa-external-link fa-fw control_color"></i> Протоколи в други Области </a><br/>
                                            <a class="my_a back_link" href="{!! URL::to( '/') !!}"><i class="fa fa-industry fa-fw control_color"></i> Протоколи Производители на ПРЗ</a><br/>
                                            <br/>
                                            <a class="my_a back_link" href="{!! URL::to( '/') !!}"> <i class="fa fa-calendar fa-fw red"></i> Месечни справки</a>
                                            <a class="my_a back_link " href="{!! URL::to( '/') !!}" style="float: right; margin-right: 10px"> <i class="fa fa-flask fa-fw brown"></i> Дневник взети проби от ПРЗ </a>

                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
