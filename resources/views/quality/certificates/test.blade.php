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

    <body>




    <div id="SELECT_country">
    </div>

    <div id="DIV_country">
    </div>

    <button id="add">
        add
    </button>

    <button id="remove">
        remove
    </button>




















    
    </body>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/fields.js"></script>
    <script>
        var j = 0;

        function add_country() {
            j++;
            var select = document.getElementById("SELECT_country");
            var clone = select.cloneNode(true);
            clone.setAttribute("id", "SELECT_country" + j);
            clone.textContent = "SELECT_country" + j;
            clone.setAttribute("name", "country" + j);
            document.getElementById("DIV_country").appendChild(clone);
        }

        function remove_country() {
            var select = document.getElementById('DIV_country');
            select.removeChild(select.lastChild);
        }

        document.getElementById('add').addEventListener('click', add_country, false);
        document.getElementById('remove').addEventListener('click', remove_country, false);
    </script>
@endsection

@section('scripts')
    {!!Html::script("js/table/jquery-1.11.3.min.js" )!!}
    {!!Html::script("js/table/jquery.dataTables.js" )!!}
    {!!Html::script("js/table/firmsImportersTable.js" )!!}
@endsection


