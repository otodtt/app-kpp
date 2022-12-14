@extends('layouts.farmers')
@section('title')
    {{ 'Стари Констативни Протоколи на ЗС' }}
@endsection

@section('css')
    {!!Html::style("css/table/jquery.dataTables.css" )!!}
    {!!Html::style("css/date/jquery.datetimepicker.css" )!!}
    {!!Html::style("css/records/index_protocols.css" )!!}
    {!!Html::style("css/opinions/table_opinions.css " )!!}
    {!!Html::style("css/opinions/old_protocols.css " )!!}
@endsection

@section('message')
    @include('layouts.alerts.success')
@endsection

@section('content')
    <div class="div-layout-title">
        <h4 class="bold layout-title title-bottom">КОНСТАТИВНИ ПРОТОКОЛИ ЗА ИЗМИНАЛИ ГОДИН ИЗДАДЕНИ ПРИ ПРОВЕРКИ НА ЗЕМЕДЕЛСКИ СТОПАНИ</h4>
    </div>
    <hr/>
    <div class="btn-group">
        <a href="/" class="fa fa-home btn btn-info my_btn"> Началo</a>
        <a href="{!! URL::to('/стари-протоколи-всички')!!}" class="fa fa-file-powerpoint-o btn btn-warning my_btn"> Всички Констативни Протоколи</a>
        <a href="{!! URL::to('/стари-протоколи-становища')!!}" class="fa fa-address-card-o btn btn-warning my_btn"> За Становища</a>
        <span class="fa fa-user-times btn btn-default my_btn">  Проверки на ЗС</span>
        <a href="{!! URL::to('/стари-протоколи-дфз')!!}" class="fa fa-money btn btn-warning my_btn"> Съвместно с ДФЗ</a>
        <a href="{!! URL::to('/стари-протоколи-други')!!}" class="fa fa-euro btn btn-warning my_btn"> Други плащания</a>
    </div>
    <hr/>
    <fieldset class="form-group">
        <div class="wrap_sort">
            <div id="wr_choiz_all">
                <div id="search_wrap" class="col-md-5">
                    {!! Form::open(array('url'=>'/стари-протоколи-стопани', 'method'=>'POST')) !!}
                    @include('old.protocols.market.index.search')
                    {!! Form::close() !!}
                </div>
                <div class="col-md-4">
                    <span class="errors">
                        @if ($errors->has('search_protocols'))
                            {{ $errors->first('search_protocols') }}<br/>
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset class="form-group">
        <div class="wrap_sort">
            <div id="wr_choiz_all" class="col-md-12">
                {!! Form::open(array('url'=>'/стари-протоколи-стопани/сортирай', 'method'=>'POST')) !!}
                @include('old.records_old.index_farmers.years_sort')
                {!! Form::close() !!}
                <span class="errors">
                    @if ($errors->has('start_year'))
                        {{ $errors->first('start_year') }}<br/>
                    @endif
                    @if ($errors->has('end_year'))
                        {{ $errors->first('end_year') }}
                    @endif
                </span>
            </div>
        </div>
    </fieldset>
    <fieldset class="form-group">
        <div class="wrap_sort">
            <div id="wr_choiz_all">
                {!! Form::open(array('url'=>'/стари-протоколи-стопани/сортирай', 'method'=>'POST')) !!}
                @include('old.records_old.index_farmers.sorting')
                {!! Form::close() !!}
            </div>
        </div>
    </fieldset>
    <hr/>
    @include('old.records_old.index_farmers.alphabet')
    <div class="refresh">
        <a href="{{ url('/стари-протоколи-стопани') }}" class="fa fa-eraser btn btn-primary my_btn">&nbsp; Изчисти сортирането!</a>
    </div>
    <hr/>
    @include('old.records_old.index.table')
@endsection

@section('scripts')
    {!!Html::script("js/table/jquery-1.11.3.min.js" )!!}
    {!!Html::script("js/table/jquery.dataTables.js" )!!}
    {!!Html::script("js/table/date-de.js" )!!}

    {!!Html::script("js/records/protocolsTable.js" )!!}
    {!!Html::script("js/build/jquery.datetimepicker.full.min.js" )!!}
    {!!Html::script("js/date/in_date.js" )!!}
@endsection