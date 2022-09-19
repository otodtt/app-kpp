@extends('layouts.quality')

@section('content')
    <div class="container">
        <div class="row">
            <div class="row">
                <a href="/crops">КУЛТУРИ</a>
            </div>
            <h2>Редактиране на Кутура</h2>
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
                {!! Form::model($crops, ['url'=>'crops/update/'.$crops->id, 'method'=>'POST', 'id'=>'form', 'class'=>'form-horizontal']) !!}
                <fieldset>
                    <div class="form-group">
                        <label for="select" class="col-lg-2 control-label">Група</label>
                        <div class="col-lg-10">
                            {!! Form::select('group_id',
                                array('' => 'Избери!',
                                1 =>'Зърненожитни',
                                2 => 'Бобови',
                                3 => 'Технически',
                                4 => 'Зеленчуци',
                                5 => 'Зелеви култури',
                                6 => 'Тиквови култури',
                                7 => 'Лукови култури',
                                8 => 'Овощни',
                                9 => 'Ягодоплодни',
                                10 => 'Лоза',
                                11 => 'Етерично-Маслени',
                                12 => 'Украсни и Горски видове',
                                13 => 'Цитросови'),
                                null,['id' => 'group_id', 'class'=>'form-control'])
                            !!}

                            <br>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-lg-2 control-label">Име на български</label>
                        <div class="col-lg-10">
                            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Име на български', 'id'=>'name' ]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="latin_name" class="col-lg-2 control-label">Име на Латински</label>
                        <div class="col-lg-10">
                            {!! Form::text('latin_name', null, ['class'=>'form-control', 'placeholder'=>'hordeum-vulgare', 'id'=>'latin_name' ]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cropDescription" class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                            {!! Form::textarea('cropDescription', null, ['class'=>'form-control', 'id'=>'cropDescription' ]) !!}
                        </div>
                        <p>
                            Продукти (Препарати) за растителна защита при ..... . Фунгициди, Инсектициди, Хербициди, Акарициди, Нематоциди, Десиканти, Растежни регулатори и др. при борба с болести, неприятели и плевели по ..... .
                        </p>
                    </div>

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