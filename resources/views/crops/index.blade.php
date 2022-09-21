@extends('layouts.quality')

@section('title')
    {{ 'Всички Култири' }}
@endsection

@section('css')
    {!!Html::style("css/firms_objects/firms_all_css.css" )!!}
    {!!Html::style("css/table/jquery.dataTables.css" )!!}
    {!!Html::style("css/table/table_firms.css" )!!}
    {!!Html::style("css/table/crop.css" )!!}
@endsection

@section('content')
    <div class="div-layout-title" style="margin-bottom: 20px; margin-top: 20px">
        <h4 class="bold layout-title">ВСИЧКИ КУЛТУРИ</h4>
    </div>
    <hr/>
    <div class="btn-group" >
        <a href="/" class="fa fa-home btn btn-info my_btn"> Началo</a>
        <a href="{!! URL::to('/контрол/сертификати')!!}" class="fa fa-certificate btn btn-info my_btn"> Сертификати</a>
        <a href="{!! URL::to('/контрол/вносители')!!}" class="fa fa-truck btn btn-info my_btn"> Всички вносители</a>
        <span class="fa fa-leaf btn btn-default my_btn"> Всички култури</span>
        {{--<a href="{!! URL::to('/складове')!!}" class="fa fa-shield btn btn-info my_btn"> Всички складове</a>--}}
        {{--<a href="{!!URL::to('/изтекъл-срок')!!}" class="fa fa-times btn btn-info my_btn"> С изтекъл или прекратен срок</a>--}}
    </div>
    <div class="btn_add_firm">
        <a href="{!!URL::to('/контрол/култури/create')!!}" class="fa fa-arrow-circle-right btn btn-danger my_btn"> Добави култура</a>
    </div>
    <hr/>
    <div class="container">
        <div class="row">
           <h4>Зърненожитни</h4>
           <table class="table">
               <thead>
                   <tr>
                       <th>N</th>
                       <th>Име</th>
                       <th>Име Англиски</th>
                       <th>Латинско</th>
                       <th>Латинско мое</th>
                       <th class="crop_center">Edit</th>
                       <th class="crop_center">Покажи</th>
                   </tr>
               </thead>
               <tbody>
               @foreach($cultures as $culture)
                    @if($culture->group_id == 1)
                        <tr>
                            <td class="first_td">{{$culture->id}}</td>
                            <td class="crop_td">{{$culture ->name}}</td>
                            <td class="crop_td">{{$culture ->name_en}}</td>
                            <td class="crop_td">{{$culture ->latin}}</td>
                            <td class="crop_td">{{$culture ->latin_name}}</td>
                            <td  class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td  class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-edit btn btn-success">
                                    &nbsp;ВИЖ КУЛТУРАТА!
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
               </tbody>
           </table>
        </div>
        <div class="row">
            <h4>Бобови</h4>
            <table class="table">
                <tbody>
                    @foreach($cultures as $culture)
                        @if($culture->group_id == 2)
                            <tr>
                                <td class="first_td">{{$culture->id}}</td>
                                <td class="crop_td">{{$culture ->name}}</td>
                                <td class="crop_td">{{$culture ->name_en}}</td>
                                <td class="crop_td">{{$culture ->latin}}</td>
                                <td class="crop_td">{{$culture ->latin_name}}</td>
                                <td class="crop_btn">
                                    <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                        &nbsp;Редактирай!
                                    </a>
                                </td>
                                <td class="crop_btn">
                                    <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-edit btn btn-success">
                                        &nbsp;ВИЖ КУЛТУРАТА!
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <h4>Технически</h4>
            <table class="table">
                @foreach($cultures as $culture)
                    @if($culture->group_id == 3)
                        <tr>
                            <td class="first_td">{{$culture->id}}</td>
                            <td class="crop_td">{{$culture ->name}}</td>
                            <td class="crop_td">{{$culture ->name_en}}</td>
                            <td class="crop_td">{{$culture ->latin}}</td>
                            <td class="crop_td">{{$culture ->latin_name}}</td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-edit btn btn-success">
                                    &nbsp;ВИЖ КУЛТУРАТА!
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        <div class="row">
            <h4>Зеленчуци</h4>
            <table class="table">
                @foreach($cultures as $culture)
                    @if($culture->group_id == 4)
                        <tr>
                            <td class="first_td">{{$culture->id}}</td>
                            <td class="crop_td">{{$culture ->name}}</td>
                            <td class="crop_td">{{$culture ->name_en}}</td>
                            <td class="crop_td">{{$culture ->latin}}</td>
                            <td class="crop_td">{{$culture ->latin_name}}</td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-edit btn btn-success">
                                    &nbsp;ВИЖ КУЛТУРАТА!
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        <div class="row">
            <h4>Зелеви култури</h4>
            <table class="table">
                @foreach($cultures as $culture)
                    @if($culture->group_id == 5)
                        <tr>
                            <td class="first_td">{{$culture->id}}</td>
                            <td class="crop_td">{{$culture ->name}}</td>
                            <td class="crop_td">{{$culture ->name_en}}</td>
                            <td class="crop_td">{{$culture ->latin}}</td>
                            <td class="crop_td">{{$culture ->latin_name}}</td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-edit btn btn-success">
                                    &nbsp;ВИЖ КУЛТУРАТА!
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        <div class="row">
            <h4>Тиквови култури</h4>
            <table class="table">
                @foreach($cultures as $culture)
                    @if($culture->group_id == 6)
                        <tr>
                            <td class="first_td">{{$culture->id}}</td>
                            <td class="crop_td">{{$culture ->name}}</td>
                            <td class="crop_td">{{$culture ->name_en}}</td>
                            <td class="crop_td">{{$culture ->latin}}</td>
                            <td class="crop_td">{{$culture ->latin_name}}</td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-edit btn btn-success">
                                    &nbsp;ВИЖ КУЛТУРАТА!
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        <div class="row">
            <h4>Лукови култури</h4>
            <table class="table">
                @foreach($cultures as $culture)
                    @if($culture->group_id == 7)
                        <tr>
                            <td class="first_td">{{$culture->id}}</td>
                            <td class="crop_td">{{$culture ->name}}</td>
                            <td class="crop_td">{{$culture ->name_en}}</td>
                            <td class="crop_td">{{$culture ->latin}}</td>
                            <td class="crop_td">{{$culture ->latin_name}}</td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-edit btn btn-success">
                                    &nbsp;ВИЖ КУЛТУРАТА!
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>

        <div class="row">
            <h4>Листни зеленчуци</h4>
            <table class="table">
                @foreach($cultures as $culture)
                    @if($culture->group_id == 8)
                        <tr>
                            <td class="first_td">{{$culture->id}}</td>
                            <td class="crop_td">{{$culture ->name}}</td>
                            <td class="crop_td">{{$culture ->name_en}}</td>
                            <td class="crop_td">{{$culture ->latin}}</td>
                            <td class="crop_td">{{$culture ->latin_name}}</td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-edit btn btn-success">
                                    &nbsp;ВИЖ КУЛТУРАТА!
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        <div class="row">
            <h4>Коренови и стъблени</h4>
            <table class="table">
                @foreach($cultures as $culture)
                    @if($culture->group_id == 9)
                        <tr>
                        <tr>
                            <td class="first_td">{{$culture->id}}</td>
                            <td class="crop_td">{{$culture ->name}}</td>
                            <td class="crop_td">{{$culture ->name_en}}</td>
                            <td class="crop_td">{{$culture ->latin}}</td>
                            <td class="crop_td">{{$culture ->latin_name}}</td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-edit btn btn-success">
                                    &nbsp;ВИЖ КУЛТУРАТА!
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        <div class="row">
            <h4>Овощни</h4>
            <table class="table">
                @foreach($cultures as $culture)
                    @if($culture->group_id == 10)
                        <tr>
                            <td class="first_td">{{$culture->id}}</td>
                            <td class="crop_td">{{$culture ->name}}</td>
                            <td class="crop_td">{{$culture ->name_en}}</td>
                            <td class="crop_td">{{$culture ->latin}}</td>
                            <td class="crop_td">{{$culture ->latin_name}}</td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-edit btn btn-success">
                                    &nbsp;ВИЖ КУЛТУРАТА!
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        <div class="row">
            <h4>Ягодоплодни</h4>
            <table class="table">
                @foreach($cultures as $culture)
                    @if($culture->group_id == 11)
                        <tr>
                            <td class="first_td">{{$culture->id}}</td>
                            <td class="crop_td">{{$culture ->name}}</td>
                            <td class="crop_td">{{$culture ->name_en}}</td>
                            <td class="crop_td">{{$culture ->latin}}</td>
                            <td class="crop_td">{{$culture ->latin_name}}</td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-edit btn btn-success">
                                    &nbsp;ВИЖ КУЛТУРАТА!
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        <div class="row">
            <h4>Лозя</h4>
            <table class="table">
                @foreach($cultures as $culture)
                    @if($culture->group_id == 12)
                        <tr>
                            <td class="first_td">{{$culture->id}}</td>
                            <td class="crop_td">{{$culture ->name}}</td>
                            <td class="crop_td">{{$culture ->name_en}}</td>
                            <td class="crop_td">{{$culture ->latin}}</td>
                            <td class="crop_td">{{$culture ->latin_name}}</td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-edit btn btn-success">
                                    &nbsp;ВИЖ КУЛТУРАТА!
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        <div class="row">
            <h4>Етерично-Маслени</h4>
            <table class="table">
                @foreach($cultures as $culture)
                    @if($culture->group_id == 13)
                        <tr>
                            <td class="first_td">{{$culture->id}}</td>
                            <td class="crop_td">{{$culture ->name}}</td>
                            <td class="crop_td">{{$culture ->name_en}}</td>
                            <td class="crop_td">{{$culture ->latin}}</td>
                            <td class="crop_td">{{$culture ->latin_name}}</td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-edit btn btn-success">
                                    &nbsp;ВИЖ КУЛТУРАТА!
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        <div class="row">
            <h4>Украсни и Горски видове</h4>
            <table class="table">
                @foreach($cultures as $culture)
                    @if($culture->group_id == 14)
                        <tr>
                            <td class="first_td">{{$culture->id}}</td>
                            <td class="crop_td">{{$culture ->name}}</td>
                            <td class="crop_td">{{$culture ->name_en}}</td>
                            <td class="crop_td">{{$culture ->latin}}</td>
                            <td class="crop_td">{{$culture ->latin_name}}</td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-edit btn btn-success">
                                    &nbsp;ВИЖ КУЛТУРАТА!
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        <div class="row">
            <h4>Цитросови</h4>
            <table class="table">
                @foreach($cultures as $culture)
                    @if($culture->group_id == 15)
                        <tr>
                            <td class="first_td">{{$culture->id}}</td>
                            <td class="crop_td">{{$culture ->name}}</td>
                            <td class="crop_td">{{$culture ->name_en}}</td>
                            <td class="crop_td">{{$culture ->latin}}</td>
                            <td class="crop_td">{{$culture ->latin_name}}</td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-edit btn btn-success">
                                    &nbsp;ВИЖ КУЛТУРАТА!
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        <div class="row">
            <h4>Други</h4>
            <table class="table">
                @foreach($cultures as $culture)
                    @if($culture->group_id == 16)
                        <tr>
                            <td class="first_td">{{$culture->id}}</td>
                            <td class="crop_td">{{$culture ->name}}</td>
                            <td class="crop_td">{{$culture ->name_en}}</td>
                            <td class="crop_td">{{$culture ->latin}}</td>
                            <td class="crop_td">{{$culture ->latin_name}}</td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-edit btn btn-success">
                                    &nbsp;ВИЖ КУЛТУРАТА!
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>
@endsection