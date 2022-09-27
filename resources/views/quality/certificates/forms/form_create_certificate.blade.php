<?php
if (isset($last_number[0]['number'])){
    $last = $last_number[0]['number'];
    $last_plus = $last_number[0]['number']+1;
}  else {
    $last = '- няма такъв';
    $last_plus = 1;
}

?>
<div class="container-fluid" >
    <div class="row">
        <div class="col-md-12" >
            <fieldset class="small_field" ><legend class="small_legend">Избери преди да попълниш сертификата!</legend>
                <div class="col-md-6 col-md-6_my in_table" >
                    <fieldset class="small_field_in" style="display: none">
                        <p class="description">
                            Поле № 7. Избери за какво се издава сертификата.
                        </p>
                        <hr class="hr_in"/>
                        <label class="labels_limit"><span>Вътрешен/Internal</span>
                            {!! Form::radio('what_7', 1) !!}
                        </label>&nbsp;&nbsp;|
                        <label class="labels_limit"><span>&nbsp;&nbsp;Внос/Import</span>
                            {!! Form::radio('what_7', 2, true) !!}
                        </label>
                        &nbsp; | &nbsp;
                        <label class="labels_limit"><span>&nbsp;&nbsp;Износ/Export</span>
                            {!! Form::radio('what_7', 3) !!}
                        </label>
                    </fieldset>
                    <fieldset class="small_field_in" >
                        <p class="description">
                            Поле № 7. За какво се издава сертификата.
                        </p>
                        <hr class="hr_in"/>
                        <label class="labels_limit"><span>Вътрешен/Internal</span>
                        </label>&nbsp;&nbsp;|
                        <label class="labels_limit"><span>&nbsp;&nbsp;Внос/Import</span>
                            <i class="fa fa-check-circle-o" aria-hidden="true"></i>
                        </label>
                        &nbsp; | &nbsp;
                        <label class="labels_limit"><span>&nbsp;&nbsp;Износ/Export</span>
                        </label>
                    </fieldset>
                </div>
                <div class="col-md-6 col-md-6_my in_table" >
                    <fieldset id="show_type" class="small_field_in show_type ">
                        <p class="description">
                            Поле № 1 колона 2. Избери дали е за консумация или преработка.
                        </p>
                        <hr class="hr_in"/>
                        <label class="labels_limit"><span>За консумация</span>
                            {!! Form::radio('type_crops', 1) !!}
                        </label>&nbsp;&nbsp;|
                        <label class="labels_limit"><span>&nbsp;&nbsp;За преработка</span>
                            {!! Form::radio('type_crops', 2) !!}
                        </label>&nbsp; | &nbsp;
                    </fieldset>
                </div>
            </fieldset>
        </div>
    </div>
</div>

<hr class="my_hr_in"/>

<div id="field_wrapper" >

    {{-- Търговец --}}
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-6" >
                <fieldset class="small_field"><legend class="small_legend">1. Търговец /Trader</legend>
                    <div class="col-md-7 col-md-6_my" >
                        <p class="description">
                            Поле № 1 Избери фирмата! Търговец /Trader &nbsp; &nbsp; &nbsp;<br>
                        </p>
                        <label for="importers_choice">Избери вносител:</label>
                        <select name="importer_data" id="importer_data" class="localsID form-control">
                            <option value="">-- Избери --</option>
                            @foreach($importers as $importer)
                                <option value="{{$importer['id']}}"
                                        {{(old('importer_data') == $importer['id'])? 'selected':''}}
                                        name_en="{{$importer['name_en']}}" 
                                        address_en="{{$importer['address_en']}}"
                                        vin="{{$importer['vin']}}" >{{$importer['id']}} - {{ strtoupper($importer['name_en']) }}</option>
                            @endforeach
                        </select>
                        <input type=hidden name="en_name" id="en_name" />
                        <input type=hidden name="en_address" id="en_address" />
                        <input type=hidden name="vin_hidden" id="vin_hidden" />
                    </div>
                    <div  class="col-md-5">
                        <p class="description">
                            <span class="red">ВАЖНО!!!</span> Ако фирмата я няма в падащото меню, иди на страница
                            „ВСИЧКИ ВНОСИТЕЛИ“ и добави фирмата!
                        </p>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-6">
                <fieldset class="small_field"><legend class="small_legend">Сертификат за съответствие </legend>
                    <div class="col-md-12 col-md-6_my" >
                        <p class="description">
                            Сертификат за съответствие с пазарните стандарти на Европейския съюз,
                        </p>
                        <br>
                        <p class="bold">№/No {{ $index[0]['q_index'] }}-{{$user[0]['stamp_number']}}/1001</p>
                        <p class="description red">
                            Провери дали данните са верни!
                        </p>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>

    <hr class="my_hr_in"/>

    {{--Опаковчик, посочен върху опаковката--}}
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-4" >
                <fieldset class="small_field"><legend class="small_legend">2. Опаковчик, посочен върху опаковката </legend>
                    <div class="col-md-12 col-md-6_my" >
                        <p class="description">
                            Поле № 2. Опаковчик, посочен върху .. &nbsp; &nbsp; &nbsp;<br>
                        </p>
                        <label for="packer_name">Име на Опаковчик:</label>
                        {!! Form::text('packer_name', null, ['class'=>'form-control', 'style'=>'width: 97%', 'placeholder'=> 'Име на Опаковчик']) !!}
                        <br>
                        <label for="packer_address">Адрес:</label>
                        {!! Form::text('packer_address', null, ['class'=>'form-control', 'style'=>'width: 97%', 'placeholder'=> 'Адрес на Опаковчик', 'autocomplete'=> 'packer_address']) !!}
                    </div>
                </fieldset>
            </div>
            <div class="col-md-2">
                <fieldset class="small_field"><legend class="small_legend">3. Контролен орган</legend>
                    <p class="description">
                        Поле № 3. Контролен орган
                    </p>
                    <br>
                    <p> <p class="bold">{{ $index[0]['authority_bg'] }}</p></p>
                    <p> <p class="bold">{{ $index[0]['authority_en'] }}</p></p>
                    <br>
                    <br>
                    <br>
                </fieldset>
            </div>
            <div class="col-md-3">
                <fieldset class="small_field"><legend class="small_legend">4. Произход
                    </legend>
                    <div class="col-md-12 col-md-6_my" >
                        <p class="description">
                            Поле № 4. Място на инспекцията/страна на произход

                        </p>
                        <br>
                        <label for="from_country">Страна:</label>
                        {!! Form::text('from_country', null, ['class'=>'form-control', 'style'=>'width: 97%', 'autocomplete'=> 'from_country', 'placeholder'=> 'Турция/ Turkey' ]) !!}
                        <br>
                        <br>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-3">
                <fieldset class="small_field"><legend class="small_legend">5. Местоназначение</legend>
                    <div class="col-md-12 col-md-6_my" >
                        <p class="description">
                            Поле № 5. Регион или страна на .. /Region
                        </p>
                        <label for="country">Избери страна:</label>
                        <select name="country" id="country" class="localsID form-control" style="width: 97%">
                            <option value="">-- Избери --</option>
                            @foreach($countries as $country)
                                <option value="{{$country['id']}}|{{ $country['name_en'] }}" >{{ mb_strtoupper($country['name'], 'utf-8' )  }}</option>
                            @endforeach
                        </select>
                        <p class="description">
                            Региона ако се изисква
                        </p>
                        <label for="for_country_more">Регион/страна:</label>
                        {!! Form::text('for_country_more', null, ['class'=>'form-control', 'style'=>'width: 97%', 'autocomplete'=> 'for_country_more']) !!}
                    </div>
                </fieldset>
            </div>
        </div>
    </div>

    <hr class="my_hr_in"/>

    {{--Идентификация на тр. средства--}}
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-6" >
                <fieldset class="small_field"><legend class="small_legend">Идентификация на тр. средства/ За какво е сертификата</legend>

                    <div class="col-md-12" >
                        <p class="description">
                            Поле № 6 Идентификация на транспортните средства.
                        </p>
                        {!! Form::label('transport', 'Номера:', ['class'=>'my_labels']) !!}
                        {!! Form::text('transport', null, ['class'=>'form-control', 'style'=>'width: 50%', 'maxlength'=>30]) !!}
                    </div>
                </fieldset>
            </div>
            <div class="col-md-6 ">
                <fieldset class="small_field"><legend class="small_legend">За какво се издава сертификата.</legend>
                    <p class="description">
                        Поле № 7
                    </p>
                    <p id="p_internal_no"><i class="fa fa-square-o" aria-hidden="true"></i> <span>вътрешен/internal</span></p>
                    <p id="p_internal_yes" class="hidden"><i class="fa fa-check-square-o" aria-hidden="true"></i> <span style="text-decoration: underline">вътрешен/internal</span></p>

                    <p id="p_import_no"><i class="fa fa-square-o" aria-hidden="true"></i> <span >внос/import</span></p>
                    <p id="p_import_yes" class="hidden"><i class="fa fa-check-square-o" aria-hidden="true"></i> <span style="text-decoration: underline">внос/import</span></p>

                    <p id="p_export_no"><i class="fa fa-square-o" aria-hidden="true"></i> <span>износ/export</span></p>
                    <p id="p_export_yes" class="hidden"><i class="fa fa-check-square-o" aria-hidden="true"></i> <span style="text-decoration: underline">износ/export</span></p>
                </fieldset>
            </div>
        </div>
    </div>

    <hr class="my_hr_in"/>

    {{--Място и дата на провеката--}}
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-12" >
                <fieldset class="small_field"><legend class="small_legend">Данни за митническо учреждение</legend>
                    <div class="row">
                        <div class="col-md-5">
                            <fieldset class="small_field_in">
                                <p class="description">Поле 12. Митническо учреждение </p><hr class="hr_in"/>
                                <div class="col-md-12 col-md-6_my" >
                                    {!! Form::label('customs_bg', 'Митница на български:', ['class'=>'my_labels']) !!}&nbsp;
                                    {!! Form::text('customs_bg', null, ['class'=>'form-control form-control-my', 'size'=>30, 'maxlength'=>250,
                                    'placeholder'=> 'МБ Свиленград' ]) !!}
                                    <br><br>
                                    {!! Form::label('customs_en', 'Митница на латиница:  ', ['class'=>'my_labels']) !!}&nbsp;&nbsp;
                                    {!! Form::text('customs_en', null, ['class'=>'form-control form-control-my', 'size'=>30, 'maxlength'=>250,
                                    'placeholder'=> 'CP-Svilengrad' ]) !!}
                                </div>
                            </fieldset>
                        </div>
                        {{--<hr class="hr_in"/>--}}
                        <div class="col-md-5">
                            <fieldset class="small_field_in">
                                <p class="description">Поле 12. Място на издаване </p><hr class="hr_in"/>
                                <div class="col-md-12 col-md-6_my" >
                                    {!! Form::label('place_bg', 'Място на български:', ['class'=>'my_labels']) !!}&nbsp;
                                    {!! Form::text('place_bg', null, ['class'=>'form-control form-control-my', 'size'=>30, 'maxlength'=>250,
                                    'placeholder'=> 'Свиленград' ]) !!}
                                    <br><br>
                                    {!! Form::label('place_en', 'Място на латиница:', ['class'=>'my_labels']) !!}&nbsp;&nbsp;
                                    {!! Form::text('place_en', null, ['class'=>'form-control form-control-my', 'size'=>30, 'maxlength'=>250,
                                    'placeholder'=> 'Svilengrad' ]) !!}
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-2">
                            <fieldset class="small_field_in" >
                                <p class="description">Поле 12. Валиден до </p><hr class="hr_in"/>
                                <br>
                                <div class="col-md-12 col-md-6_my" >
                                    {!! Form::label('date_issue', 'Дата:', ['class'=>'my_labels']) !!}
                                    {!! Form::text('date_issue', null, ['class'=>'form-control form-control-my date_certificate',
                                    'id'=>'date_issue', 'size'=>12, 'maxlength'=>10, 'placeholder'=>'дд.мм.гггг' ]) !!}
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>

    <hr class="my_hr_in"/>

    {{--ФАКТУРА И ДАТА--}}
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-12">
                <fieldset class="small_field"><legend class="small_legend">Инспектор, Номер и дата на Фактура</legend>
                    <fieldset class="small_field_in" style="width: 49%; float: left">
                        <p class="description">Инспектор</p>
                        <hr class="hr_in" />
                        <p style="margin-top: 15px">
                            <span class="bold">{{ mb_strtoupper($user[0]['all_name']), 'utf-8' }}</span>
                            <span class="bold" style="float: right; margin-right: 20px">{{date('d.m.Y', time())}}</span>
                        </p>
                    </fieldset>
                    <fieldset class="small_field_in" style="width: 49%; float: right">
                        <p class="description"><span class="fa fa-warning red" aria-hidden="true"> ЗАДЪЛЖИТЕЛНО </span>
                            попълни номера и датата на фактурата!</p><hr class="hr_in"/>
                        <div class="col-md-6 col-md-6_my" >
                            {!! Form::label('invoice', 'Фактура №', ['class'=>'my_labels']) !!}
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            {!! Form::text('invoice', null, ['class'=>'form-control form-control-my', 'size'=>10, 'maxlength'=>10 ]) !!}
                        </div>
                        <div class="col-md-6 " >
                            {!! Form::label('date_invoice', 'Дата Фактура:', ['class'=>'my_labels']) !!}
                            {!! Form::text('date_invoice', null, ['class'=>'form-control form-control-my date_certificate',
                            'id'=>'date_invoice', 'size'=>13, 'maxlength'=>10, 'placeholder'=>'дд.мм.гггг' ]) !!}
                        </div>
                    </fieldset>

                </fieldset>
            </div>
        </div>
    </div>
</div>