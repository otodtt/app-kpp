@extends('layouts.quality')
@section('title')
    {{ 'Всички Фирми' }}
@endsection

@section('css')
    {!!Html::style("css/firms_objects/firms_all_css.css" )!!}
    {!!Html::style("css/table/jquery.dataTables.css" )!!}
    {!!Html::style("css/table/table_firms.css " )!!}
@endsection

@section('message')
    @include('layouts.alerts.success')
@endsection

@section('content')
    <div class="div-layout-title" style="margin-bottom: 20px; margin-top: 20px">
        <h4 class="bold layout-title">TEST</h4>
    </div>

    <body><div class="col-md-12">
        <form>
            <div class="input_fields_wrap">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Websites</label>
                            <select name="websites[]" class="form-control" required="">
                                <option value="">--Select Websites--</option>
                                <option value="pakainfo">Pakainfo</option>
                                <option value="4cgandhi">4cgandhi</option>
                                <option value="infinityknow">infinityknow</option>
                                <option value="w3school">w3school </option>
                                <option value="tutorialspoint">tutorialspoint</option>
                            </select>
                        </div>
                        <div class="form-group" >
                            <label for="">Email</label>
                            <input name="email[]" type="text" value="" class="form-control" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Numbers</label>
                            <input name="number[]" type="text" value="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Location</label>
                            <textarea class="form-control" name="locations[]" required=""></textarea>
                        </div>
                    </div>
                    <button style="background-color:green;" class="add_field_button btn btn-info active">Add More Location</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/fields.js"></script>
    <script>
        $(document).ready(function() {
            var max_fields = 15;
            var wrapper = $(".input_fields_wrap");
            var add_button = $(".add_field_button");
            var x = 1; //initlal text box count
            $(add_button).click(function(e){
                e.preventDefault();
                if(x < max_fields){
                    x++;
                    $(wrapper).append('<div class="row"><div class="col-md-6"><div class="form-group"><label for="">Websites</label><select name="websites[]" class="form-control"><option value="">--Select Websites--</option><option value="pakainfo">Pakainfo</option><option value="4cgandhi">4cgandhi</option><option value="infinityknow">infinityknow</option><option value="w3school">w3school </option><option value="tutorialspoint">tutorialspoint</option></select></div><div class="form-group"><label for="">Email</label><input name="email[]" type="text" class="form-control"></div></div><div class="col-md-6"><div class="form-group"><label for="">Numbers</label><input name="number[]" type="text" class="form-control"></div><div class="form-group"><label for="">Location</label><textarea class="form-control" name="locations[]"></textarea></div></div><div style="cursor:pointer;background-color:red;" class="remove_field btn btn-info">Remove</div></div>');
                }
            });
            $(wrapper).on("click",".remove_field", function(e){
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });
    </script>
@endsection

@section('scripts')
    {!!Html::script("js/table/jquery-1.11.3.min.js" )!!}
    {!!Html::script("js/table/jquery.dataTables.js" )!!}
    {!!Html::script("js/table/firmsImportersTable.js" )!!}
@endsection