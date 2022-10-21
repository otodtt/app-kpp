@extends('layouts.quality')
@section('title')
    {{ 'Сертификат' }}
@endsection

@section('css')
    {{--{!!Html::style("css/date/jquery.datetimepicker.css" )!!}--}}
    {{-- {!!Html::style("css/opinions/logo_document.css" )!!} --}}
    {!!Html::style("css/qcertificates/show_opinion.css" )!!}
{{--    {!!Html::style("css/qcertificates/body_table.css" )!!}--}}
{{--    {!!Html::style("css/firms_objects/firms_all_css.css" )!!}--}}
    {!!Html::style("css/table/jquery.dataTables.css" )!!}
    {!!Html::style("css/table/table_firms.css " )!!}
@endsection

@section('message')
    @include('admin.alerts.success')
@endsection

@section('content')
    <div class="info-wrap">
        <a href="{!! URL::to('контрол/търговци')!!}" class="fa fa-truck btn btn-success my_btn my_floats"> Назад!</a>
        @if($importer->trade == 0)
            <h4 class="bold title_doc" >ФИРМА ВНОСИТЕЛ</h4>
        @elseif($importer->trade == 1)
            <h4 class="bold title_doc" >ФИРМА ИЗНОСИТЕЛ</h4>
        @elseif($importer->trade == 2)
            <h4 class="bold title_doc" >ФИРМА ВНОС/ИЗНОС</h4>
        @endif

        
        <hr class="my_hr"/>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <fieldset class="big_field ">
            <div class="row-height-my col-md-12" style="display: table">
                <div style="display: table-row">
                    <div class="small_field_center top_info" style="display: table-cell" >
                        @if($importer->trade == 0)
                            <span class="span-firm-info"><i class="fa fa-paper-plane "></i> ДАННИ НА ВНОСИТЕЛ</span>
                        @elseif($importer->trade == 1)
                            <span class="span-firm-info"><i class="fa fa-paper-plane "></i> ДАННИ НА ИЗНОСИТЕЛ</span>
                        @elseif($importer->trade == 2)
                            <span class="span-firm-info"><i class="fa fa-paper-plane "></i> ФИРМА ВНОС/ИЗНОС</span>
                        @endif

                    </div>
                </div>
                <div style="display: table-row">
                    <div class="small_field_center" style="display: table-cell">
                        <p>Вносител</p>
                        <hr class="my_hr_in"/>
                        <p >Фирма: <span class="bold" style="text-transform: uppercase">{{$importer->name_bg }}</span></p>
                        <p >Адрес: <span class="bold">{{$importer->address_bg }}</span></p>
                        <hr class="my_hr_in"/>
                        <p >Фирма: <span class="bold" style="text-transform: uppercase">{{$importer->name_en }}</span></p>
                        <p >Адрес: <span class="bold">{{$importer->address_en }}</span></p>
                        <hr class="my_hr_in"/>
                        <p >ЕИК/VIN: <span class="bold">{{$importer->vin }}</span></p>
                    </div>
                </div>
            </div>
            <hr class="my_hr_in"/>
        </fieldset>
    </div>
    <div style="width: 95%; margin: 0 auto">
        <table id="example_firm" class="display my_table table-striped " cellspacing="0" width="100%" border="1px">
            <thead>
            <tr>
                <th>N</th>
                <th>Номер/дата на Сертификата</th>
                <th>Номер/дата на Фактурата</th>
                <th>Стойност</th>
                <th>Стоки</th>
                <th>Kg</th>
                <th>Издаден от</th>
                <th>Виж</th>
            </tr>
            </thead>
            <tbody>
            <?php $n = 1; ?>
            @foreach($certificates as $certificate)
                <tr>
                    <td class="center"><?= $n++ ?></td>
                    <td>
                        {{$certificate->import }} /{{ date('d.m.Y', $certificate->date_issue) }}
                    </td>
                    <td>
                        @if($certificate->invoice_number != 0)
                            {{$certificate->invoice_number}} /{{date('d.m.Y', $certificate->invoice_date) }}
{{--                            {{$certificate->stamp_number }}/{{$certificate->import }} - {{$certificate->invoice_number}} /{{date('d.m.Y', $certificate->invoice_date) }}--}}
                        @else
                            <p class="red">Не е въведана фактурата</p>
                        @endif
                    </td>
                    <td class="center">
                        @if($certificate->sum != 0)
                            {{$certificate->sum}}
                        @endif
                    </td>
                    <td>
                        @if($stocks != 0)
                            @foreach($stocks as $stock)
                                <?php
                                    foreach($stock as $val) {
                                        if($val['certificate_id'] == $certificate->id) {
                                            ?>
                                                <p>{{$val['crops_name']}}</p>
                                            <?php
                                        }
                                    }
                                ?>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        @if($stocks != 0)
                            @foreach($stocks as $stock)
                                <?php
                                    foreach($stock as $val) {
                                        if($val['certificate_id'] == $certificate->id) {
                                            ?>
                                                <p style="text-align: right; margin-right: 10px">{{ number_format($val['weight'], 0, ',', ' ') }}</p>
                                            <?php
                                        }
                                    }
                                    if($stock[0]['certificate_id'] == $certificate->id && (count($stock)> 1)){
                                        $sum = array_sum(array_column($stock, 'weight'));
                                        ?>
                                            <p style="text-align: left; margin-left: 5px; font-weight: bold">{{ $sum }}</p>
                                        <?php
                                    }
                                ?>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        {{$certificate->inspector_bg}}
                    </td>
                    <td class="center">
                        {{--@if($invoice->invoice_for == 1)--}}
                        {{--<span>Сетификат за внос - </span>--}}
                        {{--@elseif($invoice->invoice_for == 2)--}}
                        {{--<span>Сетификат за износ - </span>--}}
                        {{--@endif--}}

                        <a href="{!!URL::to('/контрол/сертификат/'.$certificate->id )!!}" class="fa fa-binoculars btn btn-success my_btn"></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th colspan="3" style="text-align:right">Всичко лв.:</th>
                <th></th>
                <th class="bold">Всичко кг.</th>
                <th>
                    @if($stocks != 0)
                        <?php $final = array(); ?>
                        @foreach($stocks as $k=>$stock)
                            <?php
                                $final = array_merge($final, $stock);
                                $total = array_sum(array_column($final, 'weight'));
                            ?>
                        @endforeach
                        <?php
                            $total = array_sum(array_column($final, 'weight'));
                        ?>
                        <p style="text-align: left; margin-left: 10px">{{ number_format($total, 0, ',', ' ') }}</p>
                    @endif
                </th>
                <th></th>
                <th></th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection


@section('scripts')
    {!!Html::script("js/table/jquery-1.11.3.min.js" )!!}
    {!!Html::script("js/table/jquery.dataTables.js" )!!}
    {!!Html::script("js/quality/firmsImportersTable.js" )!!}
    <script>
    </script>
@endsection