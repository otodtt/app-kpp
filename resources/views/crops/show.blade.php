@extends('layouts.quality')

@section('title')
    {{ 'Всички Култири' }}
@endsection

@section('css')
    {!! Html::style('css/firms_objects/firms_all_css.css') !!}
    {!! Html::style('css/table/jquery.dataTables.css') !!}
    {!! Html::style('css/table/table_firms.css') !!}
    {!! Html::style('css/table/crop.css') !!}
@endsection

@section('message')
    @include('layouts.alerts.success')
@endsection

@section('content')
    <div class="div-layout-title" style="margin-bottom: 20px; margin-top: 20px">
        <h4 class="bold layout-title">ВСИЧКИ КУЛТУРИ</h4>
    </div>
    <hr />
    <div class="btn-group">
        <a href="/" class="fa fa-home btn btn-info my_btn"> Началo</a>
        <a href="{!! URL::to('/контрол/сертификати-внос') !!}" class="fa fa-certificate btn btn-info my_btn"> Сертификати</a>
        <a href="{!! URL::to('/контрол/фактури') !!}" class="fa fa-files-o btn btn-info my_btn"> Фактури</a>
        <a href="{!! URL::to('/контрол/търговци') !!}" class="fa fa-trademark btn btn-info my_btn"> Всички фирми</a>
        <a href="{!! URL::to('/контрол/стоки/внос') !!}" class="fa fa-tags btn btn-info my_btn"> Стоки</a>
        <span class="fa fa-leaf btn btn-default my_btn"> Култури</span>
    </div>
    <div class="btn_add_firm">
        <a href="{!! URL::to('/контрол/култури/create') !!}" class="fa fa-arrow-circle-right btn btn-danger my_btn"> Добави култура</a>
    </div>
    <hr />
    <div class="btn-group">
        <a href="{!! URL::to('/контрол/култури/внос') !!}" class="fa fa-arrow-down btn btn-info my_btn"> Култури/Внос</a>
        <a href="{!! URL::to('/контрол/култури') !!}" class="fa fa-leaf btn btn-info my_btn"> Всички Култури</a>
        {{-- <span class="fa fa-leaf btn btn-default my_btn"> Култури</span> --}}
    </div>
    <hr />
    <fieldset class="form-group">
        <div class="wrap_sort">
            <div id="wr_choiz_all">
                <div style="text-align: center;">
                    <h3>ДАННИ ЗА <span style="text-transform: uppercase">{{ $culture->name }}</span></h3>
                </div>
            </div>
        </div>
    </fieldset>
    <hr class="my_hr" />
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div style="width: 100%; margin: 0 auto">
            <table id="example_firm" class="display my_table table-striped " cellspacing="0" width="100%" border="1px">
                <thead>
                    <tr>
                        <th>N</th>
                        <th>Култура</th>
                        <th>Опакобки/бр.</th>
                        <th>Количество</th>
                        <th>Качество</th>
                        <th>За..</th>
                        <th>Номер/дата на Сертификата</th>
                        <th>Издаден на</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n = 1; ?>
                    @foreach ($stocks as $stock)
                        <tr>
                            <td class="center" style="wight: 30px"><?= $n++ ?></td>
                            <td> 
                                <?php
                                if(strlen($stock->variety) >0) {
                                    $variety = '('.$stock->variety.')';
                                }
                                else {
                                    $variety = '';
                                }
                                ?>
                                {{ $stock->crops_name }} {{$variety}}
                            </td>
                            <td>
                                <?php
                                if ($stock->type_pack == 1) {
                                    $type = 'Каси';
                                } elseif ($stock->type_pack == 2) {
                                    $type = 'Палети';
                                } elseif ($stock->type_pack == 3) {
                                    $type = 'Кашони';
                                } elseif ($stock->type_pack == 4) {
                                    $type = 'Торби';
                                } elseif ($stock->type_pack == 999) {
                                    $type = $stock->different;
                                } else {
                                    $type = '';
                                }

                                if ($stock->quality_class == 1) {
                                    $quality = ' I клас/I class';
                                } elseif ($stock->quality_class == 2) {
                                    $quality = 'II клас/II class';
                                } elseif ($stock->quality_class == 3) {
                                    $quality = 'OПС/GPS';
                                } else {
                                    $quality = '';
                                }
                                ?>
                                {{ $type }}
                                <span style="float: right; margin-right: 10px">- {{ $stock->number_packages }}</span>
                            </td>
                            <td> <span style="float: right; margin-right: 5px">{{ $stock->weight }}</span> </td>
                            <td> {{ $quality }} </td>
                            <td> 
                                <?php
                                if($stock->type_crops == 1) {
                                    $type = 'Консумация';
                                    $bold = '';
                                }
                                elseif($stock->type_crops == 2) {
                                    $type = 'Преработка';
                                    // $bold = 'font-weight: bold';
                                    $bold = 'font-style: italic; text-decoration: underline;';
                                }
                                else {
                                    $type = '';
                                    $bold = '';
                                }
                                ?>
                                <span style="{{$bold}}">{{ $type }}</span>
                            </td>
                            <td>
                                {{ $stock->certificate_number }}/{{ date('d.m.Y', $stock->date_issue) }}
                                <a style="float: right" href="{!! URL::to('/контрол/сертификат/' . $stock->certificate_id) !!}"
                                    class="fa fa-search btn btn-success my_btn"></a>
                            </td>
                            <td> 
                                {{ $stock->firm_name }} 
                                <a style="float: right" href="{!! URL::to('/контрол/търговци/'.$stock->firm_id.'/show') !!}"
                                    class="fa fa-binoculars btn btn-default my_btn"></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="" style="text-align:right"></td>
                        <td class="bold"></td>
                        <td class="bold" style="font-weight: bold">Всичко кг.</td>
                        <td style="font-weight: bold">
                            <?php 
                                $final = []; 
                                $array = (array) $stocks;
                            ?>
                            @foreach ($array as $k => $stock)
                                <?php
                                $final = array_merge($final, $stock);
                                $total = array_sum(array_column($final, 'weight'));
                                ?>
                            @endforeach
                            <p style="float: right; margin-right: 5px">{{ number_format($total, 0, ',', ' ') }}</p>
                        </td>
                        <td ></td>
                        <td ></td>
                        <td ></td>
                        <td ></td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>

@endsection
