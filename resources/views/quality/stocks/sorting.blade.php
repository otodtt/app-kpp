<?php
if(Input::has('start_year') || Input::has('end_year') || Input::has('crop_sort') || Input::has('inspector_sort') || Input::has('abc')){
    // $sort_abc = Input::get('abc');
    $start_years = Input::get('start_year');
    $end_years =  Input::get('end_year');
    $sort_crop_return =  Input::get('crop_sort');
    $sort_inspector_return =  Input::get('inspector_sort');
}
else{
    if(isset($years_start_sort) || isset($years_end_sort) || isset($sort_crop) || isset($sort_inspector)){
        $start_years = $years_start_sort;
        $end_years = $years_end_sort;
        $sort_crop_return =  $sort_crop;
        $sort_inspector_return =  $sort_inspector;
    }
    else{
        $start_years = 0;
        $end_years =  0;
        $sort_crop_return =  0;
        $sort_inspector_return =  0;
    }
}
if((int)$start_years == 0){
    $start_years = null;
}
if((int)$end_years == 0){
    $end_years = null;
}
?>
<div  class="col-md-4">
    {!! Form::label('start_year', 'От дата: ', ['class'=>'labels']) !!}
    {!! Form::text('start_year', $start_years, ['class'=>'form-control form-control-my-search search_value', 'size'=>10, 'maxlength'=>10,'id'=>'start_year', 'style'=>'height: 34px; width: 110px' , 'autocomplete'=>'off']) !!}
    &nbsp;&nbsp; | &nbsp;&nbsp;
    {!! Form::label('end_year', ' До дата: ', ['class'=>'labels']) !!}
    {!! Form::text('end_year', $end_years, ['class'=>'form-control form-control-my-search search_value', 'size'=>30, 'maxlength'=>10, 'id'=>'end_year', 'style'=>'height: 34px; width: 110px', 'autocomplete'=>'off']) !!}
</div>
<div class="col-md-6">
    {!! Form::label('limit_sort', ' Сортирай:', ['class'=>'labels']) !!}
    <select name="crop_sort" id="crop_sort" class="localsID form-control" style="display: inline-block; width: 150px; margin-right: 50px;">
        <option value="0">по стока</option>
        @foreach ($list as $k => $li)
            <option value="{{ $k }}"  {{($sort_crop_return == $k)? 'selected':''}}> {{ $li }} </option>
        @endforeach
    </select>
    {!! Form::select('inspector_sort', $inspectors, $sort_inspector_return, ['class'=>'form-control inspector_sort', 'style'=>'display: inline-block; width: 150px; margin-right: 50px;']) !!}
</div>
<div class="col-md-2">
    {!! Form::submit(' СОРТИРАЙ', array('class' => 'fa fa-search btn btn-primary my_btn ')) !!}
</div>