<?php
if(Input::has('start_year') || Input::has('end_year') || Input::has('limit_sort') || Input::has('inspector_sort') || Input::has('abc')){
    // $sort_abc = Input::get('abc');
    $start_years = Input::get('start_year');
    $end_years =  Input::get('end_year');
    $sort_limit_return =  Input::get('limit_sort');
    $sort_inspector_return =  Input::get('inspector_sort');
}
else{
    // $sort_abc = $abc;
    if(isset($years_start_sort) || isset($years_end_sort) || isset($sort_limit) || isset($sort_inspector)){
        $start_years = $years_start_sort;
        $end_years = $years_end_sort;
        $sort_limit_return =  $sort_limit;
        $sort_inspector_return =  $sort_inspector;
    }
    else{
        $start_years = 0;
        $end_years =  0;
        $sort_limit_return =  0;
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
    {!! Form::text('start_year', $start_years, ['class'=>'form-control form-control-my-search search_value', 'size'=>30, 'maxlength'=>10,'id'=>'start_year', 'style'=>'height: 34px;']) !!}
    &nbsp;&nbsp; | &nbsp;&nbsp;
    {!! Form::label('end_year', ' До дата: ', ['class'=>'labels']) !!}
    {!! Form::text('end_year', $end_years, ['class'=>'form-control form-control-my-search search_value', 'size'=>30, 'maxlength'=>10, 'id'=>'end_year', 'style'=>'height: 34px;']) !!}
</div>
<div class="col-md-6">
    {!! Form::label('limit_sort', ' Сортирай:', ['class'=>'labels']) !!}
    <select name="list_stock" id="list_stock" class="localsID form-control" style="display: inline-block; width: 200px; margin-right: 50px;">
        <option value="">по стока</option>
        @foreach ($list as $k => $li)
            <?php print_r($li); ?>
            <option value="{{ $k }}"> {{ $li }} </option>
        @endforeach
    </select>
    {!! Form::select('inspector_sort', $inspectors, $sort_inspector_return, ['class'=>'form-control inspector_sort', 'style'=>'display: inline-block; width: 200px; margin-right: 50px;']) !!}
    &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
    {!! Form::submit(' СОРТИРАЙ', array('class' => 'fa fa-search btn btn-primary my_btn ')) !!}
    {{-- <input type="hidden" name="abc" value="{!! $sort_abc !!}"> --}}
</div>