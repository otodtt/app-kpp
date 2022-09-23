@extends('layouts.quality')
@section('title')
    {{ 'Добави Сертификат!' }}
@endsection

@section('css')
    {!!Html::style("css/qcertificates/add_edit.css" )!!}
    {!!Html::style("css/date/jquery.datetimepicker.css" )!!}
@endsection

@section('content')
    <hr class="my_hr"/>
    <div class="alert alert-info my_alert" role="alert">
        <div class="row">
            <div class="col-md-12 " >
                <h3 class="my_center" >Добавяне на Сертификат!</h3>
            </div>
        </div>
    </div>
    <div class="alert alert-danger my_alert" role="alert">
        <p class="my_p"><span class="fa fa-warning red" aria-hidden="true"></span> <span class="bold red">Внимание! Прочети преди да продължиш!</span><br/>
            <span class="bold">Веднъж направен запис, Номера на Сертификата не може повече да се променя!
                Веднъж направен запис, Сертификата не може да се изтрие, може само да се редактира!
            </span>
        </p>
    </div>
    <div class="form-group">
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {!! Form::open(['url'=>'контрол/сертификати/store' , 'method'=>'POST', 'id'=>'form', 'files'=>true, 'autocomplete'=>'off']) !!}
            @include('quality.certificates.forms.form_create_certificate')
            <div class="col-md-6 " >
                <a href="{{ '/контрол/сертификати' }}" class="fa fa-arrow-circle-left btn btn-success my_btn-success"> Откажи! Назад към сертификатите!</a>
            </div>
            <div class="col-md-6" id="add_certificate">
                {!! Form::submit('Добави НОВ Сертификат!', ['class'=>'btn btn-danger', 'id'=>'submit']) !!}
            </div>
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" id="token">
        {!! Form::close() !!}
    </div>
    <br/>
    <hr/>
@endsection

@section('scripts')
    {!!Html::script("js/build/jquery.datetimepicker.full.min.js" )!!}
    {!!Html::script("js/date/in_date.js" )!!}
    {!!Html::script("js/confirm/prevent.js" )!!}
    <script>
        $('input[name="what_7"]').on('click', function(){

            if($('input[name=what_7]:checked').val() == 0){
                $( "#show_type" ).addClass( "hidden" );
                $( "#p_internal_yes" ).addClass( "hidden" );
                $( "#p_import_yes" ).addClass( "hidden" );
                $( "#p_export_yes" ).addClass( "hidden" );
            }
            else if($('input[name=what_7]:checked').val() == 1){
                $( "#show_type" ).removeClass( "hidden" );
                $( "#p_internal_yes" ).removeClass( "hidden" );
                $( "#p_internal_no" ).addClass( "hidden" );

                $( "#p_import_yes" ).addClass( "hidden" );
                $( "#p_import_no" ).removeClass( "hidden" );
                $( "#p_export_yes" ).addClass( "hidden" );
                $( "#p_export_no" ).removeClass( "hidden" );
            }
            else if($('input[name=what_7]:checked').val() == 2){
                $( "#show_type" ).removeClass( "hidden" );
                $( "#p_import_yes" ).removeClass( "hidden" );
                $( "#p_import_no" ).addClass( "hidden" );

                $( "#p_internal_yes" ).addClass( "hidden" );
                $( "#p_internal_no" ).removeClass( "hidden" );
                $( "#p_export_yes" ).addClass( "hidden" );
                $( "#p_export_no" ).removeClass( "hidden" );
            }
            else if($('input[name=what_7]:checked').val() == 3){
                $( "#show_type" ).removeClass( "hidden" );
                $( "#p_export_yes" ).removeClass( "hidden" );
                $( "#p_export_no" ).addClass( "hidden" );

                $( "#p_internal_yes" ).addClass( "hidden" );
                $( "#p_internal_no" ).removeClass( "hidden" );
                $( "#p_import_yes" ).addClass( "hidden" );
                $( "#p_import_no" ).removeClass( "hidden" );
            }
            else{
                $( "#show_type" ).addClass( "hidden" );
            }
        });

        $('input[name="type_crops"]').on('click', function(){

            if($('input[name=type_crops]:checked').val() == 0){
                $( "#field_wrapper" ).addClass( "hidden" );
                $( "#add_certificate" ).addClass( "hidden" );
            }
            else if($('input[name=type_crops]:checked').val() != 0){
                $( "#field_wrapper" ).removeClass( "hidden" );
                $( "#add_certificate" ).removeClass( "hidden" );
            }
            else{
                $( "#field_wrapper" ).addClass( "hidden" );
                $( "#add_certificate" ).addClass( "hidden" );
            }
        });

        function run() {
            var different = document.getElementsByClassName('type_pack')[0].value;
            if (different == 1) {
                $( ".different_row" ).removeClass( "hidden" );
            }
            else {
                $( ".different_row" ).addClass( "hidden" );
            }
        }
        function runCrop() {
            var different = document.getElementById("crops").value;
            if (different == 1) {
                $( ".different_crops" ).removeClass( "hidden" );
            }
            else {
                $( ".different_crops" ).addClass( "hidden" );
            }
        }

//        if ($("input[name='limit_certificate']").is(':checked')){
//            if($('input[name=limit_certificate]:checked').val() == 1){
//                $( "#date_end" ).addClass( "hidden" );
//                $( "#date_end_label" ).addClass( "hidden" );
//            }
//            else if($('input[name=limit_certificate]:checked').val() >= 2){
//                $( "#date_end" ).removeClass( "hidden" );
//                $( "#date_end_label" ).removeClass( "hidden" );
//
//            }
//            else{
//                $( "#date_end" ).addClass( "hidden" );
//                $( "#date_end_label" ).addClass( "hidden" );
//            }
//        }
//        else{
//            $( "#date_end" ).addClass( "hidden" );
//            $( "#date_end_label" ).addClass( "hidden" );
//        }

        $('#importer_data').change(function () {
            var en_name=$(this).find('option:selected').attr('name_en');
            var en_address=$(this).find('option:selected').attr('address_en');
            var vin_hidden=$(this).find('option:selected').attr('vin');
            $('#en_name').val(en_name);
            $('#en_address').val(en_address);
            $('#vin_hidden').val(vin_hidden);
        });
    </script>
@endsection