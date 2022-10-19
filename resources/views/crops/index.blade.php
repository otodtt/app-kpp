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

@section('message')
    @include('layouts.alerts.success')
@endsection

@section('content')
    <div class="div-layout-title" style="margin-bottom: 20px; margin-top: 20px">
        <h4 class="bold layout-title">ВСИЧКИ КУЛТУРИ</h4>
    </div>
    <hr/>
    <div class="btn-group" >
        <a href="/" class="fa fa-home btn btn-info my_btn"> Началo</a>
        <a href="{!! URL::to('/контрол/сертификати')!!}" class="fa fa-certificate btn btn-info my_btn"> Сертификати</a>
        <a href="{!! URL::to('/контрол/фактури')!!}" class="fa fa-files-o btn btn-info my_btn"> Фактури</a>
        <a href="{!! URL::to('/контрол/търговци')!!}" class="fa fa-truck btn btn-info my_btn"> Всички търговци</a>
        <span class="fa fa-leaf btn btn-default my_btn"> Всички култури</span>
    </div>
    <div class="btn_add_firm">
        <a href="{!!URL::to('/контрол/култури/create')!!}" class="fa fa-arrow-circle-right btn btn-danger my_btn"> Добави култура</a>
    </div>
    <hr/>
    <fieldset class="form-group">
        <div class="wrap_sort">
            <div id="wr_choiz_all">
                <div  id="sort_miar_wrap"  style="justify-content: center">
                    <h3>Всички култури</h3>
                </div>
            </div>
        </div>
    </fieldset>
    <hr/>
    <div class="container">
        <div class="row">

            <h4 style="margin-top: 20px">Зърненожитни</h4>
            <table class="table">
               <tbody>
               @foreach($cultures as $culture)
                    @if($culture->group_id == 1)
                        <tr>
                            <td class="first_td">{{$culture->id}}</td>
                            <td class="crop_td">{{$culture ->name}}</td>
                            <td class="crop_td">{{$culture ->name_en}}</td>
                            <td  class="crop_btn">
                                <form action="{{ url('/crops/delete/'.$culture->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Наистина ли искате да изтриете тази култура?');">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" id="token">
                                </form>
                            </td>
                            <td  class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td  class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-binoculars btn btn-success">
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
                                <td  class="crop_btn">
                                    <form action="{{ url('/crops/delete/'.$culture->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Наистина ли искате да изтриете тази култура?');">
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" id="token">
                                    </form>
                                </td>
                                <td class="crop_btn">
                                    <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                        &nbsp;Редактирай!
                                    </a>
                                </td>
                                <td class="crop_btn">
                                    <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-binoculars btn btn-success">
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
                            <td  class="crop_btn">
                                <form action="{{ url('/crops/delete/'.$culture->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Наистина ли искате да изтриете тази култура?');">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" id="token">
                                </form>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-binoculars btn btn-success">
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
                            <td  class="crop_btn">
                                <form action="{{ url('/crops/delete/'.$culture->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Наистина ли искате да изтриете тази култура?');">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" id="token">
                                </form>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-binoculars btn btn-success">
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
                            <td  class="crop_btn">
                                <form action="{{ url('/crops/delete/'.$culture->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Наистина ли искате да изтриете тази култура?');">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" id="token">
                                </form>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-binoculars btn btn-success">
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
                            <td  class="crop_btn">
                                <form action="{{ url('/crops/delete/'.$culture->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Наистина ли искате да изтриете тази култура?');">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" id="token">
                                </form>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-binoculars btn btn-success">
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
                            <td  class="crop_btn">
                                <form action="{{ url('/crops/delete/'.$culture->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Наистина ли искате да изтриете тази култура?');">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" id="token">
                                </form>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-binoculars btn btn-success">
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
                            <td  class="crop_btn">
                                <form action="{{ url('/crops/delete/'.$culture->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Наистина ли искате да изтриете тази култура?');">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" id="token">
                                </form>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-binoculars btn btn-success">
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
                            <td  class="crop_btn">
                                <form action="{{ url('/crops/delete/'.$culture->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Наистина ли искате да изтриете тази култура?');">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" id="token">
                                </form>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-binoculars btn btn-success">
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
                            <td  class="crop_btn">
                                <form action="{{ url('/crops/delete/'.$culture->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Наистина ли искате да изтриете тази култура?');">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" id="token">
                                </form>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-binoculars btn btn-success">
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
                            <td  class="crop_btn">
                                <form action="{{ url('/crops/delete/'.$culture->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Наистина ли искате да изтриете тази култура?');">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" id="token">
                                </form>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-binoculars btn btn-success">
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
                            <td  class="crop_btn">
                                <form action="{{ url('/crops/delete/'.$culture->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Наистина ли искате да изтриете тази култура?');">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" id="token">
                                </form>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-binoculars btn btn-success">
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
                            <td  class="crop_btn">
                                <form action="{{ url('/crops/delete/'.$culture->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Наистина ли искате да изтриете тази култура?');">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" id="token">
                                </form>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-binoculars btn btn-success">
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
                            <td  class="crop_btn">
                                <form action="{{ url('/crops/delete/'.$culture->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Наистина ли искате да изтриете тази култура?');">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" id="token">
                                </form>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-binoculars btn btn-success">
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
                            <td  class="crop_btn">
                                <form action="{{ url('/crops/delete/'.$culture->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Наистина ли искате да изтриете тази култура?');">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" id="token">
                                </form>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-binoculars btn btn-success">
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
                            <td  class="crop_btn">
                                <form action="{{ url('/crops/delete/'.$culture->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Наистина ли искате да изтриете тази култура?');">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" id="token">
                                </form>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/edit/'.$culture->id)!!}" class="fa fa-edit btn btn-primary">
                                    &nbsp;Редактирай!
                                </a>
                            </td>
                            <td class="crop_btn">
                                <a href="{!!URL::to('/crops/show/'.$culture->id)!!}" class="fa fa-binoculars btn btn-success">
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