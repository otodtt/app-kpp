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
                        <label class="type_crops"><span>&nbsp;&nbsp;За преработка</span>
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
    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-6" >
                <fieldset class="small_field"><legend class="small_legend">Данни за Опаковчик, посочен върху опаковката</legend>
                    <div class="col-md-6 col-md-6_my" >
                        <p class="description">
                            Поле № 2. Опаковчик. Избери фирмата вносител.
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
                </fieldset>
            </div>
            <div class="col-md-6">
                {{-- <p class="description">
                    <span class="fa fa-warning red" aria-hidden="true"> ВНИМАНИЕ! </span> Номера на сертификата е попълнен автоматично. Не променяй ако не е необходимо!<br/>
                    Попълва се само номера на сертификата, без индекса пред него! Индекса ще се полпълни автоматично.<br/>
                    <span class="bold red">Пример!</span> Ако Сертификата е "26 - 0001" изписва се само 1 или 0001 .
                </p> --}}
                <fieldset class="small_field"><legend class="small_legend">Регион или страна на местоназначение</legend>
                    <div class="col-md-5 col-md-6_my" >
                        <p class="description">
                            Поле № 5. Регион или страна на местоназначение.
                        </p> 
                        <label for="country">Избери страна:</label>
                        <select name="country" id="country" class="localsID form-control">
                            <option value="">-- Избери --</option>
                            @foreach($countries as $country)
                                
                                <option value="{{$country['id']}}|{{ $country['name_en'] }}" >{{ mb_strtoupper($country['name'], 'utf-8' )  }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5 col-md-6_my" >
                        <p class="description">
                            Поле № 5. Регион или страна на местоназначение.
                        </p> 
                        <label for="country">Избери страна:</label>
                        {{-- <select name="country" id="country" class="localsID form-control">
                            <option value="">-- Избери --</option>
                            @foreach($countries as $country)
                                
                                <option value="{{$country['id']}}|{{ $country['name_en'] }}" >{{ mb_strtoupper($country['name'], 'utf-8' )  }}</option>
                            @endforeach
                        </select> --}}
                        {!! Form::label('petition', 'Заявление №', ['class'=>'my_labels']) !!}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="bold"> {{$index[0]['q_index']}} - </span>
                        {!! Form::text('petition', null, ['class'=>'form-control form-control-my', 'size'=>2, 'maxlength'=>6 ]) !!}

                    </div>
                </fieldset>
            </div>
        </div>
    </div>

    <hr class="my_hr_in"/>

    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-6" >
                <fieldset class="small_field"><legend class="small_legend">Номер и дата на заявление</legend>
                    <div class="col-md-6 col-md-6_my" >
                        {!! Form::label('petition', 'Заявление №', ['class'=>'my_labels']) !!}
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="bold"> {{$index[0]['q_index']}} - </span>
                        {!! Form::text('petition', null, ['class'=>'form-control form-control-my', 'size'=>2, 'maxlength'=>6 ]) !!}
                    </div>
                    <div class="col-md-6 col-md-6_my" >
                        {!! Form::label('date_petition', 'Дата заявление:', ['class'=>'my_labels']) !!}
                        {!! Form::text('date_petition', null, ['class'=>'form-control form-control-my date_certificate',
                        'id'=>'date_petition_certificate', 'size'=>15, 'maxlength'=>10, 'placeholder'=>'дд.мм.гггг' ]) !!}
                    </div>
                </fieldset>
            </div>
            <div class="col-md-6 ">
                <fieldset class="small_field"><legend class="small_legend">Номер и дата на Фактура</legend>
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
            </div>
        </div>
    </div>

    <hr class="my_hr_in"/>

    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-12" >
                <fieldset class="small_field"><legend class="small_legend">Данни на заявителя</legend>
                    <fieldset class="small_field_in">
                        <div class="col-md-6 col-md-6_my" >
                            {!! Form::label('owner', 'Трите имена:', ['class'=>'my_labels']) !!}
                            {!! Form::text('owner', null, ['class'=>'form-control form-control-my', 'size'=>50, 'maxlength'=>250 ]) !!}
                        </div>
                        <div class="col-md-6 col-md-6_my" >
                            <label class="labels"><span>Мъж: </span>
                                {!! Form::radio('gender', 'male') !!}
                            </label>&nbsp;&nbsp;|
                            <label class="labels"><span>&nbsp;&nbsp;Жена: </span>
                                {!! Form::radio('gender', 'female') !!}
                            </label>&nbsp;&nbsp;|
                            {!! Form::label('pin', 'ЕГН:', ['class'=>'labels']) !!}
                            {!! Form::text('pin', null, ['class'=>'form-control form-control-my', 'maxlength'=>10, 'size'=>10, 'id'=>'pin' ]) !!}
                            <label class="labels"><span>&nbsp;&nbsp;Без ЕГН: </span>
                                {!! Form::radio('gender', 'n') !!}
                            </label>
                        </div>
                    </fieldset>
                    <hr class="hr_in"/>
                    <fieldset class="small_field_in">
                        <div class="col-md-6 col-md-6_my" >
                            {!! Form::label('address', 'Точен адрес:', ['class'=>'my_labels']) !!}&nbsp;
                            {!! Form::text('address', null, ['class'=>'form-control form-control-my', 'size'=>50, 'maxlength'=>250 ]) !!}
                        </div>
                        <div class="col-md-3 col-md-6_my" >
                            {!! Form::label('phone', 'Телефон:', ['class'=>'my_labels']) !!}
                            {!! Form::text('phone', null, ['class'=>'form-control form-control-my', 'size'=>10, 'maxlength'=>15, 'placeholder'=>'0888/ 000 000' ]) !!}
                        </div>
                        <div class="col-md-3 col-md-6_my" >
                            {!! Form::label('email', 'Email:', ['class'=>'my_labels']) !!}
                            {!! Form::text('email', null, ['class'=>'form-control form-control-my', 'size'=>18, 'maxlength'=>100 ]) !!}
                        </div>
                    </fieldset>
                </fieldset>
            </div>
        </div>
    </div>

    <hr class="my_hr_in"/>

    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-12" >
                <fieldset class="small_field"><legend class="small_legend">Данни на документа</legend>
                    <div class="col-md-4 col-md-6_my" >
                        <fieldset class="small_field_in">
                            <p class="description">Въведете дали е диплома, удостоверение, сертификат и т.н.</p><hr class="hr_in"/>
                            {!! Form::label('document', 'Диплома или друг документ:', ['class'=>'my_labels']) !!}
                            {!! Form::text('document', null, ['class'=>'form-control form-control-my', 'size'=>15, 'maxlength'=>50 ]) !!}
                        </fieldset>
                    </div>
                    <div class="col-md-4 col-md-6_my" >
                        <fieldset class="small_field_in">
                            <p class="description">Ако има сериен номер го изпишете. Пример "Серия 0А".</p><hr class="hr_in"/>
                            {!! Form::label('series', 'Сериен номер на документа:', ['class'=>'my_labels']) !!}
                            {!! Form::text('series', null, ['class'=>'form-control form-control-my', 'size'=>15, 'maxlength'=>50 ]) !!}
                        </fieldset>
                    </div>
                    <div class="col-md-4 col-md-6_my" >
                        <fieldset class="small_field_in">
                            {!! Form::label('number_diploma', 'Номер на дипломата (документа):', ['class'=>'my_labels']) !!}<br>
                            {!! Form::text('number_diploma', null, ['class'=>'form-control form-control-my', 'size'=>10, 'maxlength'=>20 ]) !!}
                            {!! Form::label('date_diploma', 'от дата:', ['class'=>'my_labels']) !!}
                            {!! Form::text('date_diploma', null, ['class'=>'form-control form-control-my', 'size'=>10, 'maxlength'=>50 ]) !!}
                        </fieldset>
                    </div>

                    <div class="col-md-6 col-md-6_my institute_margin" >
                        <fieldset class="small_field_in">
                            <p class="description">Институцията издала дипломата заедно с града. Пример "ВСИ „Васил Коларов” - гр. Пловдив"</p><hr class="hr_in"/>
                            {!! Form::label('from_institute', 'От къде е издадена дипломата:', ['class'=>'my_labels']) !!}
                            {!! Form::text('from_institute', null, ['class'=>'form-control form-control-my', 'size'=>45, 'maxlength'=>250 ]) !!}
                        </fieldset>
                    </div>
                    <div class="col-md-6 col-md-6_my institute_margin" >
                        <fieldset class="small_field_in">
                            <p class="description">Въведете специалността или програмата!</p><hr class="hr_in"/>
                            {!! Form::label('specialty', 'Специалност', ['class'=>'my_labels']) !!}
                            {!! Form::text('specialty', null, ['class'=>'form-control form-control-my', 'size'=>50, 'maxlength'=>150 ]) !!}
                        </fieldset>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>

    <hr class="my_hr_in"/>

    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-12" >
                <fieldset class="small_field" ><legend class="small_legend">Данни на документа</legend>
                    <div class="col-md-6 col-md-6_my in_table" >
                        <fieldset class="small_field_in">
                            <p class="description">
                                 Срока на валидност ще се попълни автоматично в зависимост от датата на издаване.
                            </p>
                            <hr class="hr_in"/>
                            <label class="labels_limit"><span>БЕЗСРОЧЕН: </span>
                                {!! Form::radio('limit_certificate', 1) !!}
                            </label>&nbsp;&nbsp;|
                            <label class="labels_limit"><span>&nbsp;&nbsp;С ОГРАНИЧЕН СРОК: </span>
                                {!! Form::radio('limit_certificate', 2) !!}
                            </label>
                            &nbsp; | &nbsp;
                            {!! Form::label('date_end', 'До Дата:', ['class'=>'my_labels hidden', 'id' =>'date_end_label']) !!}
                            {!! Form::text('date_end', null, ['class'=>'form-control form-control-my date_end hidden',
                            'id'=>'date_end', 'size'=>13, 'maxlength'=>10, 'placeholder'=>'дд.мм.гггг' ]) !!}
                        </fieldset>
                    </div>
                    <div class="col-md-6 col-md-6_my in_table" >
                        <fieldset class="small_field_in">
                            <p class="description"><span class="fa fa-warning red" aria-hidden="true"> ВНИМАНИЕ! </span>
                                Снимката трябва да е не по-голяма от 2 МВ и формат jpg или jpeg.</p><hr class="hr_in"/>
                            {!! Form::label('file', 'Избери снимка:', ['class'=>'my_labels']) !!}
                            {!! Form::file('file',['id'=>'filename']) !!}
                        </fieldset>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>

    <hr class="my_hr_in"/>

    <div class="container-fluid" >
        <div class="row">
            <div class="col-md-5" >
                {{--<fieldset class="small_field"><legend class="small_legend">Име на инспектора обработил документите</legend>--}}
                    {{--{!! Form::label('inspector', 'Кой е обработил документите:', ['class'=>'my_labels']) !!}--}}
                    {{--{!! Form::select('inspector', $inspectors, null, ['id' =>'id_user',--}}
                            {{--'class' =>'inspector form-control form-control_my_insp' ]) !!}--}}
                {{--</fieldset>--}}
            </div>
            <div class="col-md-7 ">
                <br/>
                <p  >Задължително се избира инспектора обработил документите!</p>
            </div>
        </div>
    </div>
    <hr class="my_hr_in"/>
</div>