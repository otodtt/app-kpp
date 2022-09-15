@extends('layouts.objects')
@section('title')
    @if($admin == 1)
        {{ 'Редактиране на Аптека!' }}
    @else
        {{ 'Редактиране на Удостоверение на Аптека!' }}
    @endif

@endsection

@section('css')
    {!!Html::style("css/firms_objects/add_firm.css" )!!}
    {!!Html::style("css/firms_objects/add_object.css" )!!}
    {!!Html::style("css/firms_objects/edit_object.css" )!!}
    {!!Html::style("css/date/jquery.datetimepicker.css" )!!}
@endsection


@section('content')
    <a href="{!! URL::to('/аптеки')!!}" class="fa fa-plus-square btn btn-info my_btn"> Към всички Аптеки.</a>
    <hr class="my_hr"/>
    @if($admin == 1)
        <div class="alert alert-info my_alert my_alert_center" role="alert">
            <h4 class="my_alert_center" >Редактиране на Аптека!</h4>
        </div>
    @else
        <div class="alert alert-info my_alert my_alert_center" role="alert">
            <h4 class="my_alert_center" >Редактиране на Удостоверение на Аптека!</h4>
        </div>
    @endif
    <div class="alert alert-info my_alert2" role="alert">
        @include('old.objects.forms.firm_info')
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
        {!! Form::model($pharmacy, ['route'=>['pharmacies.update', $pharmacy->id ], 'method'=>'PUT', 'id'=>'form']) !!}
            @include('old.objects.forms.form_edit_pharmacy')
            <div class="col-md-6 ">
                @if($admin == 1)
                    <a href="/фирма/{{$firm->id}}" class="fa fa-arrow-circle-left btn btn-success my_btn-success"> Откажи! Назад към фирмата!</a>
                @else
                    <a href="/аптека-удостоверение/{{$pharmacy->firm_id}}/{{$pharmacy->id}}" class="fa fa-arrow-circle-left btn btn-success my_btn-success"> Откажи! Назад към Удостоверението!</a>
                @endif

            </div>
            <div class="col-md-6 ">
                {!! Form::submit('Редактирай ТАЗИ Аптека!', ['class'=>'btn btn-danger', 'id'=>'submit']) !!}
            </div>
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" id="token">
            <input type="hidden" name="hidden" value="{{$pharmacy->id}}" id="hidden">
            @if($admin == 1)
                <input type="hidden" name="admin" value="1" id="hidden">
            @else
                <input type="hidden" name="admin" value="0" id="hidden">
            @endif
        {!! Form::close() !!}
    </div>
    <br/>
    <hr/>
@endsection


@section('scripts')
    {!!Html::script("js/location/jquery.js" )!!}
    {!!Html::script("js/build/jquery.datetimepicker.full.min.js" )!!}
    {!!Html::script("js/date/in_date.js" )!!}
    {!!Html::script("js/confirm/prevent.js" )!!}
    {!!Html::script("js/location/findLocationPhar.js" )!!}
@endsection