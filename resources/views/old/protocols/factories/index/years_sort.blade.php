<?php
if(Input::has('start_year') || Input::has('end_year')
        || Input::has('inspector_sort') || Input::has('abc') || Input::has('assay_sort')){
    $sort_abc = Input::get('abc');
    $start_years = Input::get('start_year');
    $end_years =  Input::get('end_year');
    $sort_inspector_return =  Input::get('inspector_sort');
    $sort_assay_return =  Input::get('assay_sort');
}
else{
    $sort_abc = $abc;
    if(isset($years_start_sort) || isset($years_end_sort) || isset($sort_areas) || isset($sort_inspector) || isset($sort_assay)){
        $start_years = $years_start_sort;
        $end_years = $years_end_sort;
        $sort_inspector_return =  $sort_inspector;
        $sort_assay_return =  $sort_assay;
    }
    else{
        $start_years = 0;
        $end_years =  0;
        $sort_inspector_return =  0;
        $sort_assay_return =  0;
    }
}
if((int)$start_years == 0){
    $start_years = null;
}
if((int)$end_years == 0){
    $end_years = null;
}
?>
<div  class="col-md-9">
    {!! Form::label('start_year', 'Дата на Констативен Протокол:   От дата: ', ['class'=>'labels']) !!}
    {!! Form::text('start_year', $start_years, ['class'=>'form-control form-control-my-search search_value', 'size'=>30,
    'maxlength'=>10,'id'=>'start_year_protocols']) !!}
    &nbsp;&nbsp; | &nbsp;&nbsp;
    {!! Form::label('end_year', ' До дата: ', ['class'=>'labels']) !!}
    {!! Form::text('end_year', $end_years, ['class'=>'form-control form-control-my-search search_value', 'size'=>30,
    'maxlength'=>10, 'id'=>'end_year_protocols']) !!}
    &nbsp;&nbsp;
    {!! Form::submit(' СОРТИРАЙ ПО ДАТА', array('class' => 'fa fa-search btn btn-success my_btn ')) !!}
    <input type="hidden" name="abc" value="{!! $sort_abc !!}">
    <input type="hidden" name="inspector_sort" value="{!! $sort_inspector_return !!}">
    <input type="hidden" name="assay_sort" value="{!! $sort_assay_return !!}">
</div>