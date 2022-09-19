@extends('layouts.quality')

@section('content')
    <a href="{!! URL::to('/контрол/култури')!!}" class="fa fa-home btn btn-info my_btn" style="margin-top: 15px"> Откажи. Назад</a>
    <hr class="my_hr"/>
    <div class="alert alert-info my_alert" role="alert" style="text-align: center">
        <h3>Добавяне на Кутура</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error  }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
{{--                {!! Form::open(['url'=>'контрол/култури/store', 'method'=>'POST', 'id'=>'form', 'class'=>'form-horizontal']) !!}--}}
                    {!! Form::open(['route'=>'контрол.култури.store', 'method'=>'POST', 'class'=>'form-horizontal']) !!}
                <fieldset>
                    @include('crops.forms.form')

                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection