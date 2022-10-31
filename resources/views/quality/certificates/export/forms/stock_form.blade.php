<div class="container-fluid"  id="container" >
    <div class="row">
        <div class="col-md-12" >
            <fieldset id="show_type" class="small_field show_type " style="margin-top: 10px">
                <p class="description">
                    ВНИМАНИЕ!!! Промени ако е необходимо!!!
                </p>
                <hr class="hr_in"/>
                <?php
                    if($certificate->type_crops == 1) {
                        $type1 = 'checked';
                        $type2 = '';
                    }
                    elseif($certificate->type_crops == 2) {
                        $type1 = '';
                        $type2 = 'checked';
                    }
                    else {
                        $type1 = '';
                        $type2 = '';
                    }
                ?>
                <label class="labels_limit"><span>За консумация</span>
                    {!! Form::radio('type_crops', 1, $type1 ) !!}
                </label>&nbsp;&nbsp;|
                <label class="labels_limit"><span>&nbsp;&nbsp;За преработка</span>
                    {!! Form::radio('type_crops', 2, $type2 ) !!}
                </label>&nbsp; | &nbsp;
            </fieldset>
            <fieldset class="small_field"><legend class="small_legend">Данни на стоката</legend>
                {{-- ОПАКОВКИ --}}
                <div class="col-md-4 col-md-6_my" >
                    <fieldset class="small_field_in">
                        <p class="description">Поле 8. Опаковки (брой и вид)</p><hr class="hr_in"/>
                        <div class="row">
                            <div class="col-md-7">
                                <label for="type_package">Вид:</label>
                                <br>
                                <select onchange="run()" name="type_package" id="type" class="type_pack localsID form-control" style="width: 100%">
                                    <option value="0" {{(old('type_package') == 0 )? 'selected':''}} >Избери вида опаковка</option>
                                    <option value="4" {{(old('type_package') == 4 )? 'selected':''}} >Торби/ Bags</option>
                                    <option value="3" {{(old('type_package') == 3 )? 'selected':''}} >Кашони/ C. boxes</option>
                                    <option value="2" {{(old('type_package') == 2 )? 'selected':''}} >Палети/ Cages</option>
                                    <option value="1" {{(old('type_package') == 1 )? 'selected':''}} >Каси/ Pl. cases</option>
                                    <option value="999" {{(old('type_package') == 999 )? 'selected':''}} >ДРУГО</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                            {!! Form::label('number', 'Брой опаковки:', ['class'=>'my_labels']) !!}
                                <br>
                            {!! Form::number('number_packages', null, ['class'=>'hide_number form-control form-control-my', 'style'=>'width: 100px', 'size'=>'5', 'maxlength'=>'10']) !!}
                            </div>
                        </div>
                        <div class="row different_row hidden" id="different_row">
                            <div class="col-md-7">
                                {!! Form::text('different', null, ['class'=>'form-control', 'style'=>'width: 100%; margin-top: 10px', 'placeholder'=> 'Опаковката я няма в списъка']) !!}
                            </div>
                        </div>

                    </fieldset>
                </div>
                {{-- КУЛТУРИ --}}
                <div class="col-md-4 col-md-6_my" >
                    <fieldset class="small_field_in">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="description">Поле 9. Тип продукт (сорт, </p><hr class="hr_in"/>
                                <label for="crops">Избери култура:</label>
                                <br>
                                <select name="crops" id="crops" class="localsID form-control">
                                    <option value="0">-- Избери --</option>
                                    @foreach($crops as $crop)
                                    <option value="{{$crop['id']}}" 
                                        {{(old('crops') == $crop['id'])? 'selected':''}}
                                        crop_en="{{$crop['name_en']}}" 
                                        crops_name="{{$crop['name']}}"
                                        group_id="{{$crop['group_id']}}"
                                    >{{ mb_strtoupper($crop['name'], 'utf-8') }}
                                    </option>
                                    @endforeach
                                </select>
                                {!! Form::hidden('crop_en', old('crop_en'), ['id'=>'crop_en']) !!}
                                {!! Form::hidden('crops_name', old('crops_name'), ['id'=>'crops_name']) !!}
                                {!! Form::hidden('group_id', old('group_id'), ['id'=>'group_id']) !!}
                                <input type="hidden" name="certificate_id" value="{{$id}}">
                                <input type="hidden" name="certificate_number" value="{{$certificate->import}}">
                                <input type="hidden" name="firm_id" value="{{$certificate->importer_id}}">
                                <input type="hidden" name="firm_name" value="{{$certificate->importer_name}}">
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <p class="description">Сорт (произход), ако..</p><hr class="hr_in"/>
                                    <label for="variety">Сорт/Произход:</label>
                                    <br>
                                    {!! Form::text('variety', null, ['class'=>'form-control', 'style'=>'width: 97%', 'placeholder'=> 'Сорт/Произход ако е необходимо', 'style' => 'padding-left: 6px']) !!}
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                {{-- Качество --}}
                <div class="col-md-2"  style="padding: 0">
                    <fieldset class="small_field_in">
                        <p class="description">Поле 10</p><hr class="hr_in"/>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="quality_class">Качество:</label>
                                <select name="quality_class" id="quality_class" class="localsID form-control" style="width: 95%">
                                    <option value="0" {{(old('quality_class') == 0 )? 'selected':''}} >Избери</option>
                                    <option value="1" {{(old('quality_class') == 1 )? 'selected':''}} >I клас/I class</option>
                                    <option value="2" {{(old('quality_class') == 2 )? 'selected':''}} >II клас/II class</option>
                                    <option value="3" {{(old('quality_class') == 3 )? 'selected':''}} >OПС/GPS</option>
                                </select>
                            </div>
                        </div>
                    </fieldset>
                </div>
                {{-- Количество --}}
                <div class="col-md-2" style="padding: 0" >
                    <fieldset class="small_field_in">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="description">Поле 11</p><hr class="hr_in"/>
                                
                                {{-- <label class="weigh"><span>Количество: </span> --}}
                                <label for="weight">Количество:</label>
                                <br>
                                {!! Form::number('weight', null, ['class'=>'hide_number form-control form-control-my', 'style'=>'width: 100px', 'size'=>'5', 'maxlength'=>'10']) !!}
                            </div>
                        </div>
                    </fieldset>
                </div>
            </fieldset>
        </div>
    </div>
</div>

