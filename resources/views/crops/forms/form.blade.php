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
            8 => 'Коренови и стъблени',
            9 => 'Овощни',
            10 => 'Ягодоплодни',
            11 => 'Лоза',
            12 => 'Етерично-Маслени',
            13 => 'Украсни и Горски видове',
            14 => 'Цитросови'),
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
    <label for="name_en" class="col-lg-2 control-label">Име на английски</label>
    <div class="col-lg-10">
        {!! Form::text('name_en', null, ['class'=>'form-control', 'placeholder'=>'Име на английски', 'id'=>'name_en' ]) !!}
    </div>
</div>
<div class="form-group">
    <label for="latin" class="col-lg-2 control-label">Име на Латински</label>
    <div class="col-lg-10">
        {!! Form::text('latin', null, ['class'=>'form-control', 'placeholder'=>'Hordeum vulgare', 'id'=>'latin' ]) !!}
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