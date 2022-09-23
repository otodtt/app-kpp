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
                    <fieldset class="small_field_in">
                        <p class="description">
                            Поле № 7. Избери за какво се издава сертификата.
                        </p>
                        <hr class="hr_in"/>
                        <label class="labels_limit"><span>Вътрешен/Internal</span>
                            {!! Form::radio('what_7', 1) !!}
                        </label>&nbsp;&nbsp;|
                        <label class="labels_limit"><span>&nbsp;&nbsp;Внос/Import</span>
                            {!! Form::radio('what_7', 2) !!}
                        </label>
                        &nbsp; | &nbsp;
                        <label class="labels_limit"><span>&nbsp;&nbsp;Износ/Export</span>
                            {!! Form::radio('what_7', 3) !!}
                        </label>

                    </fieldset>
                </div>
                <div class="col-md-6 col-md-6_my in_table" >
                    <fieldset id="show_type" class="small_field_in show_type hidden">
                        <p class="description">
                            Поле № 1 колона 2. Избери дали е за консумация или преработка.
                        </p>
                        <hr class="hr_in"/>
                        <label class="labels_limit"><span>За консумация</span>
                            {!! Form::radio('type_crops', 1) !!}
                        </label>&nbsp;&nbsp;|
                        <label class="labels_limit"><span>&nbsp;&nbsp;За преработка</span>
                            {!! Form::radio('type_crops', 2) !!}
                        </label>
                        &nbsp; | &nbsp;

                    </fieldset>
                </div>
            </fieldset>
        </div>
    </div>
</div>

<hr class="my_hr_in"/>
<div id="field_wrapper" class="">
    {{--Данни за Опаковчик, посочен върху опаковката--}}
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-6" >
                <fieldset class="small_field"><legend class="small_legend">Данни за Опаковчик, посочен върху опаковката</legend>
                    <div class="col-md-7 col-md-6_my" >
                        <p class="description">
                            Поле № 2 Избери фирмата! Опаковчик, посочен върху опаковката
                        </p> 
                        {{-- РАБОТИ ТОЗИ ВАРИАНР --}}
                        <label for="importers_choice">Избери вносител:</label>
                        <select name="importer_data" id="importer_data" class="localsID form-control">
                            <option value="">-- Избери --</option>
                            @foreach($importers as $importer)
                                <option value="{{$importer['id']}}" 
                                        name_en="{{$importer['name_en']}}" 
                                        address_en="{{$importer['address_en']}}"
                                        vin="{{$importer['vin']}}" >{{$importer['id']}} - {{ strtoupper($importer['name_en']) }}</option>
                            @endforeach
                        </select>
                        <input type=hidden name="en_name" id="en_name" />
                        <input type=hidden name="en_address" id="en_address" />
                        <input type=hidden name="vin_hidden" id="vin_hidden" />

                        {{-- И това работи --}}
                        {{-- <label for="importers_choice">Избери вносител:</label>
                        <select name="importer_data" id="importer_data" class="localsID form-control">
                            <option value="">-- Избери --</option>
                            @foreach($importers as $importer)
                                <option value="{{$importer['id']}}|{{$importer['name_en']}}|{{$importer['address_en']}}|{{$importer['vin']}}" >{{$importer['name_en']}}</option>
                            @endforeach
                        </select> --}}
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
                <fieldset class="small_field"><legend class="small_legend">Регион или страна на местоназначение</legend>
                    <div class="col-md-6 col-md-6_my" >
                        <p class="description">
                            Поле № 5. Регион или страна на местоназначение/Region
                        </p> 
                        <label for="country">Избери страна:</label>
                        <select name="country" id="country" class="localsID form-control" style="width: 98%">
                            <option value="">-- Избери --</option>
                            @foreach($countries as $country)
                                <option value="{{$country['id']}}|{{ $country['name_en'] }}" >{{ mb_strtoupper($country['name'], 'utf-8' )  }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 col-md-6_my" >
                        <p class="description">
                            Региона ако се изисква или страна ако я няма в списъка
                        </p> 
                        <label for="for_country_more">Регион/страна:</label>
                        {!! Form::text('for_country_more', null, ['class'=>'form-control', 'style'=>'width: 98%', 'autocomplete'=> 'for_country_more']) !!}

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

    {{--Данни на стоките--}}
    <div class="alert alert-danger my_alert" role="alert">
        <p class="my_p"><span class="fa fa-warning red" aria-hidden="true"></span> <span class="bold red">Внимание! Прочети преди да продължиш!</span><br/>
            <span class="bold">Ако култура я няма в падащото меню, иди на страница „ВСИЧКИ КУЛТУРИ“ и добави култура!
                Ако не може да се добави, тогава избери „НЯМА Я В СПИСЪКА“ и попълни полето.
            </span><br>
             <span class="bold">
                 Ако вида на опаковката го няма в падащото меню, избери „Друго“ и попълни появилото се поле.
            </span>
        </p>
    </div>
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-12" >
                <fieldset class="small_field"><legend class="small_legend">Данни на стоките</legend>
                    <div class="col-md-4 col-md-6_my" >
                        <fieldset class="small_field_in">
                            <p class="description">Поле 8. Опаковки (брой и вид)</p><hr class="hr_in"/>
                            <div class="row">
                                <div class="col-md-7">
                                    <label for="type_packages">Вид:</label>
                                    <select onchange="run()" name="type_packages['type']" class="type_pack localsID form-control" style="width: 100%">
                                        <option value="0">Избери вида опаковка</option>
                                        <option value="Каси/Pl.cases">КАСИ</option>
                                        <option value="Палети/Cages">ПАЛЕТИ</option>
                                        <option value="Бокс/Box">БОКС</option>
                                        <option value="2">НАСИПНО</option>
                                        <option value="1">Друго</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    {!! Form::label('type_packages', 'Брой опаковки:', ['class'=>'my_labels']) !!}
                                    <input type="number" name="type_packages['number']" class="form-control form-control-my" size="5"
                                           maxlength="10" style="width: 100px">
                                    {{--{!! Form::number('packages_qu[]', null, ['class'=>'form-control form-control-my', 'size'=>5,--}}
                                        {{--'maxlength'=>10, 'style'=> 'width: 100px']) !!}--}}
                                </div>
                            </div>
                            <div class="row different_row hidden" >
                                <div class="col-md-7">
                                    <input type="text" name="type_packages['different']" class="form-control" style="width: 100%; margin-top: 10px"
                                    placeholder="Опаковката я няма в списъка" maxlength="100">
                                    {{--{!! Form::text('different_package', null, ['class'=>'form-control', 'style'=>'width: 90%; margin-top: 10px',--}}
                                    {{--'maxlength'=>100, 'placeholder'=>'Опаковка която я няма в списъка']) !!}--}}
                                </div>
                                <div class="col-md-5">
                                    <input type="number" name="type_packages['dif_number']" class="form-control form-control-my" size="5"
                                           maxlength="10" style="width: 100px;  margin-top: 10px">
                                    {{--{!! Form::text('different_package', null, ['class'=>'form-control', 'style'=>'width: 90%; margin-top: 10px',--}}
                                    {{--'maxlength'=>100, 'placeholder'=>'Опаковка която я няма в списъка']) !!}--}}
                                </div>
                            </div>

                        </fieldset>
                    </div>
                    <div class="col-md-4 col-md-6_my" >
                        <fieldset class="small_field_in">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="description">Поле 9. Тип продукт (сорт, </p><hr class="hr_in"/>
                                    <label for="crops">Избери култура:</label>
                                    <select onchange="runCrop()" name="crops" id="crops" class="localsID form-control">
                                        <option value="0">-- Избери --</option>
                                        <option value="1">НЯМА Я В СПИСЪКА</option>
                                        @foreach($crops as $crop)
                                            {{--<option value="{{$crop['id']}}"--}}
                                                    {{--name_crop="{{$crop['name']}}"--}}
                                                    {{--name_en_crop="{{$crop['name_en']}}">{{ mb_strtoupper($crop['name'], 'utf-8') }}</option>--}}
                                            <option value="{{$crop['id']}}|{{$crop['name']}}|{{$crop['name_en']}}" >{{ mb_strtoupper($crop['name'], 'utf-8') }}</option>
                                    @endforeach
                                    </select>
                                    {{--<input type=hidden name="name_crop" id="name_crop" />--}}
                                    {{--<input type=hidden name="name_crop" id="name_crop" />--}}
                                    {{--<input type=hidden name="vin_hidden" id="vin_hidden" />--}}
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <p class="description">Сорт, ако..</p><hr class="hr_in"/>
                                        <label for="crops">Сорт:</label>
                                        {!! Form::text('variety', null, ['class'=>'form-control', 'style'=>'width: 100%',
                                        'maxlength'=>100, 'placeholder'=>'Сорт ако е необходимо']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row different_crops hidden" >
                                <div class="col-md-12">
                                    {!! Form::text('crops_other', null, ['class'=>'form-control', 'style'=>'width: 96%; margin-top: 10px',
                                    'maxlength'=>100, 'placeholder'=>'Култура която я няма в списъка']) !!}
                                </div>
                            </div>

                        </fieldset>
                    </div>

                    <div class="col-md-2"  style="padding: 0">
                        <fieldset class="small_field_in">
                            <p class="description">Поле 10</p><hr class="hr_in"/>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="quality_class">Качество:</label>
                                    <select name="quality_class" id="quality_class" class="localsID form-control" style="width: 95%">
                                        <option value="0">Избери</option>
                                        <option value="ПЪРВО/FIRSTs">ПЪРВО/FIRST</option>
                                        <option value="НЕ ЗНАМ СИ КВО">НЕ ЗНАМ СИ КВО</option>
                                        <option value="OПС/GPS">OПС/GPS</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                    </div>



                    <div class="col-md-2" style="padding: 0" >
                        <fieldset class="small_field_in">
                            {{--<p class="description">Поле 10 и 11</p><hr class="hr_in"/>--}}
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="description">Поле 11</p><hr class="hr_in"/>
                                    <label class="labels_limit"><span>Kg</span>
                                        {!! Form::radio('weight_kg', 1) !!}
                                    </label>&nbsp;&nbsp;|
                                    <label class="labels_limit"><span>&nbsp;&nbsp;Тон</span>
                                        {!! Form::radio('weight_kg', 2) !!}
                                    </label>
                                    <br>
                                    {{--<hr class="hr_in"/>--}}
{{--                                    {!! Form::label('weight', 'Количество:', ['class'=>'my_labels']) !!}<br>--}}
                                    {!! Form::text('weight', null, ['class'=>'form-control form-control-my', 'size'=>5,
                                    'maxlength'=>50, 'style'=>"width: 75%"]) !!}
                                    <span class="bold">К-во</span>
                                </div>
                            </div>
                            {{--{!! Form::label('from_institute', 'От къде е издадена дипломата:', ['class'=>'my_labels']) !!}--}}
                            {{--{!! Form::text('from_institute', null, ['class'=>'form-control form-control-my', 'size'=>45, 'maxlength'=>250 ]) !!}--}}
                        </fieldset>
                    </div>
                    {{--<div class="col-md-6 col-md-6_my institute_margin" >--}}
                        {{--<fieldset class="small_field_in">--}}
                            {{--<p class="description">Въведете специалността или програмата!</p><hr class="hr_in"/>--}}
                            {{--{!! Form::label('specialty', 'Специалност', ['class'=>'my_labels']) !!}--}}
                            {{--{!! Form::text('specialty', null, ['class'=>'form-control form-control-my', 'size'=>50, 'maxlength'=>150 ]) !!}--}}
                        {{--</fieldset>--}}
                    {{--</div>--}}
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
                    <fieldset class="small_field_in">
                        <p class="description">Поле 12. Към момента на издаване на сертификата </p><hr class="hr_in"/>
                        <div class="col-md-6 col-md-6_my" >
                            {!! Form::label('customs_bg', 'Митница на български:', ['class'=>'my_labels']) !!}&nbsp;
                            {!! Form::text('customs_bg', null, ['class'=>'form-control form-control-my', 'size'=>50, 'maxlength'=>250,
                            'placeholder'=> 'МБ Свиленград' ]) !!}
                        </div>
                        <div class="col-md-6 col-md-6_my" >
                            {!! Form::label('customs_en', 'Митница на латиница:', ['class'=>'my_labels']) !!}&nbsp;
                            {!! Form::text('customs_en', null, ['class'=>'form-control form-control-my', 'size'=>50, 'maxlength'=>250,
                            'placeholder'=> 'CP-Svilengrad' ]) !!}
                        </div>
                    </fieldset>
                    <hr class="hr_in"/>
                    <fieldset class="small_field_in">
                        <p class="description">Поле 12. Място и дата на издаване </p><hr class="hr_in"/>
                        <div class="col-md-6 col-md-6_my" >
                            {!! Form::label('place_bg', 'Място на български:', ['class'=>'my_labels']) !!}&nbsp;
                            {!! Form::text('place_bg', null, ['class'=>'form-control form-control-my', 'size'=>50, 'maxlength'=>250,
                            'placeholder'=> 'Свиленград' ]) !!}
                        </div>
                        <div class="col-md-6 col-md-6_my" >
                            {!! Form::label('place_en', 'Място на латиница:', ['class'=>'my_labels']) !!}&nbsp;
                            {!! Form::text('place_en', null, ['class'=>'form-control form-control-my', 'size'=>50, 'maxlength'=>250,
                            'placeholder'=> 'Svilengrad' ]) !!}
                        </div>
                    </fieldset>
                    <hr class="hr_in"/>
                    <fieldset class="small_field_in" style="width: 50%">
                        <p class="description">Поле 12. Валиден до (дата)/ </p><hr class="hr_in"/>
                        <div class="col-md-6 col-md-6_my" >
                            {!! Form::label('date_issue', 'Валиден до:', ['class'=>'my_labels']) !!}
                            {!! Form::text('date_issue', null, ['class'=>'form-control form-control-my date_certificate',
                            'id'=>'date_petition_certificate', 'size'=>15, 'maxlength'=>10, 'placeholder'=>'дд.мм.гггг' ]) !!}
                        </div>
                        {{--<div class="col-md-6 col-md-6_my" >--}}
                            {{--{!! Form::label('place_en', 'Място на латиница:', ['class'=>'my_labels']) !!}&nbsp;--}}
                            {{--{!! Form::text('place_en', null, ['class'=>'form-control form-control-my', 'size'=>50, 'maxlength'=>250,--}}
                            {{--'placeholder'=> 'Svilengrad' ]) !!}--}}
                        {{--</div>--}}
                    </fieldset>
                </fieldset>
            </div>
        </div>
    </div>

    <hr class="my_hr_in"/>

    {{--/////////////////////////////////////////////////////--}}

    <div class="container-fluid" >
        <div class="row">
            {{--<div class="col-md-6" >--}}
                {{--<fieldset class="small_field"><legend class="small_legend">Номер и дата на заявление</legend>--}}
                    {{--<div class="col-md-6 col-md-6_my" >--}}
                        {{--{!! Form::label('petition', 'Заявление №', ['class'=>'my_labels']) !!}--}}
                        {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="bold"> {{$index[0]['q_index']}} - </span>--}}
                        {{--{!! Form::text('petition', null, ['class'=>'form-control form-control-my', 'size'=>2, 'maxlength'=>6 ]) !!}--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6 col-md-6_my" >--}}
                        {{--{!! Form::label('date_petition', 'Дата заявление:', ['class'=>'my_labels']) !!}--}}
                        {{--{!! Form::text('date_petition', null, ['class'=>'form-control form-control-my date_certificate',--}}
                        {{--'id'=>'date_petition_certificate', 'size'=>15, 'maxlength'=>10, 'placeholder'=>'дд.мм.гггг' ]) !!}--}}
                    {{--</div>--}}
                {{--</fieldset>--}}
            {{--</div>--}}
            <div class="col-md-12">
                <fieldset class="small_field"><legend class="small_legend">Номер и дата на Фактура</legend>
                    <fieldset class="small_field_in" style="width: 50%">
                        <p class="description"><span class="fa fa-warning red" aria-hidden="true"> ЗАДЪЛЖИТЕЛНО </span>
                            попилни номера и датата на фактурата!</p><hr class="hr_in"/>
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

    <hr class="my_hr_in"/>



    {{--<div class="container-fluid" >--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12" >--}}
                {{--<fieldset class="small_field"><legend class="small_legend">Данни на документа</legend>--}}
                    {{--<div class="col-md-4 col-md-6_my" >--}}
                        {{--<fieldset class="small_field_in">--}}
                            {{--<p class="description">Въведете дали е диплома, удостоверение, сертификат и т.н.</p><hr class="hr_in"/>--}}
                            {{--{!! Form::label('document', 'Диплома или друг документ:', ['class'=>'my_labels']) !!}--}}
                            {{--{!! Form::text('document', null, ['class'=>'form-control form-control-my', 'size'=>15, 'maxlength'=>50 ]) !!}--}}
                        {{--</fieldset>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 col-md-6_my" >--}}
                        {{--<fieldset class="small_field_in">--}}
                            {{--<p class="description">Ако има сериен номер го изпишете. Пример "Серия 0А".</p><hr class="hr_in"/>--}}
                            {{--{!! Form::label('series', 'Сериен номер на документа:', ['class'=>'my_labels']) !!}--}}
                            {{--{!! Form::text('series', null, ['class'=>'form-control form-control-my', 'size'=>15, 'maxlength'=>50 ]) !!}--}}
                        {{--</fieldset>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-4 col-md-6_my" >--}}
                        {{--<fieldset class="small_field_in">--}}
                            {{--{!! Form::label('number_diploma', 'Номер на дипломата (документа):', ['class'=>'my_labels']) !!}<br>--}}
                            {{--{!! Form::text('number_diploma', null, ['class'=>'form-control form-control-my', 'size'=>10, 'maxlength'=>20 ]) !!}--}}
                            {{--{!! Form::label('date_diploma', 'от дата:', ['class'=>'my_labels']) !!}--}}
                            {{--{!! Form::text('date_diploma', null, ['class'=>'form-control form-control-my', 'size'=>10, 'maxlength'=>50 ]) !!}--}}
                        {{--</fieldset>--}}
                    {{--</div>--}}

                    {{--<div class="col-md-6 col-md-6_my institute_margin" >--}}
                        {{--<fieldset class="small_field_in">--}}
                            {{--<p class="description">Институцията издала дипломата заедно с града. Пример "ВСИ „Васил Коларов” - гр. Пловдив"</p><hr class="hr_in"/>--}}
                            {{--{!! Form::label('from_institute', 'От къде е издадена дипломата:', ['class'=>'my_labels']) !!}--}}
                            {{--{!! Form::text('from_institute', null, ['class'=>'form-control form-control-my', 'size'=>45, 'maxlength'=>250 ]) !!}--}}
                        {{--</fieldset>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6 col-md-6_my institute_margin" >--}}
                        {{--<fieldset class="small_field_in">--}}
                            {{--<p class="description">Въведете специалността или програмата!</p><hr class="hr_in"/>--}}
                            {{--{!! Form::label('specialty', 'Специалност', ['class'=>'my_labels']) !!}--}}
                            {{--{!! Form::text('specialty', null, ['class'=>'form-control form-control-my', 'size'=>50, 'maxlength'=>150 ]) !!}--}}
                        {{--</fieldset>--}}
                    {{--</div>--}}
                {{--</fieldset>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<hr class="my_hr_in"/>--}}

    {{--<div class="container-fluid" >--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12" >--}}
                {{--<fieldset class="small_field" ><legend class="small_legend">Данни на документа</legend>--}}
                    {{--<div class="col-md-6 col-md-6_my in_table" >--}}
                        {{--<fieldset class="small_field_in">--}}
                            {{--<p class="description">--}}
                                 {{--Срока на валидност ще се попълни автоматично в зависимост от датата на издаване.--}}
                            {{--</p>--}}
                            {{--<hr class="hr_in"/>--}}
                            {{--<label class="labels_limit"><span>БЕЗСРОЧЕН: </span>--}}
                                {{--{!! Form::radio('limit_certificate', 1) !!}--}}
                            {{--</label>&nbsp;&nbsp;|--}}
                            {{--<label class="labels_limit"><span>&nbsp;&nbsp;С ОГРАНИЧЕН СРОК: </span>--}}
                                {{--{!! Form::radio('limit_certificate', 2) !!}--}}
                            {{--</label>--}}
                            {{--&nbsp; | &nbsp;--}}
                            {{--{!! Form::label('date_end', 'До Дата:', ['class'=>'my_labels hidden', 'id' =>'date_end_label']) !!}--}}
                            {{--{!! Form::text('date_end', null, ['class'=>'form-control form-control-my date_end hidden',--}}
                            {{--'id'=>'date_end', 'size'=>13, 'maxlength'=>10, 'placeholder'=>'дд.мм.гггг' ]) !!}--}}
                        {{--</fieldset>--}}
                    {{--</div>--}}
                    {{--<div class="col-md-6 col-md-6_my in_table" >--}}
                        {{--<fieldset class="small_field_in">--}}
                            {{--<p class="description"><span class="fa fa-warning red" aria-hidden="true"> ВНИМАНИЕ! </span>--}}
                                {{--Снимката трябва да е не по-голяма от 2 МВ и формат jpg или jpeg.</p><hr class="hr_in"/>--}}
                            {{--{!! Form::label('file', 'Избери снимка:', ['class'=>'my_labels']) !!}--}}
                            {{--{!! Form::file('file',['id'=>'filename']) !!}--}}
                        {{--</fieldset>--}}
                    {{--</div>--}}
                {{--</fieldset>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<hr class="my_hr_in"/>--}}

    {{--<div class="container-fluid" >--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-5" >--}}
                {{--<fieldset class="small_field"><legend class="small_legend">Име на инспектора обработил документите</legend>--}}
                    {{--{!! Form::label('inspector', 'Кой е обработил документите:', ['class'=>'my_labels']) !!}--}}
                    {{--{!! Form::select('inspector', $inspectors, null, ['id' =>'id_user',--}}
                            {{--'class' =>'inspector form-control form-control_my_insp' ]) !!}--}}
                {{--</fieldset>--}}
            {{--</div>--}}
            {{--<div class="col-md-7 ">--}}
                {{--<br/>--}}
                {{--<p  >Задължително се избира инспектора обработил документите!</p>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<hr class="my_hr_in"/>--}}
</div>