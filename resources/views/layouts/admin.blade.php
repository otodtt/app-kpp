<!DOCTYPE html>
<html lang="bg">
<head >

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @section('title')@show</title>

    {!!Html::style("css/font-awesome.css" )!!}
    {!!Html::style("css/bootstrap.min.css" )!!}
    {!!Html::style("css/metisMenu.min.css" )!!}
    {!!Html::style("css/sb-admin-2.css" )!!}

    {!!Html::style("css/admin/admin_css.css" )!!}
    @section('css')

    @show

    <!--[if lt IE 9]>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="wrapper">
        <div class="admin_panel">
            <h3 class="my_ps bold" >АДМИНИСТРАТОРСКИ ПАНЕЛ</h3>
        </div>
        <nav class="navbar navbar-default navbar-static-top my_top_nav" role="navigation" style="margin-bottom: 0">
            <ul class="nav_my navbar-top-links navbar-left">
                <li><a  href="{!!URL::to('/начало')!!}" class="my_a back_link"> <i class="fa fa-home fa-fw"></i> Начало</a></li>
            </ul>

            <ul class="nav navbar-top-links navbar-right">
                {{ Auth::user()->short_name }}
                <li>
                    <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Излез</a>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{!!URL::to('/админ')!!}"><i class='fa fa-dashboard fa-fw'></i> Дашборд</a>
                        </li>
                       
                        <li>
                            <a href="{!!URL::to('/админ')!!}"><i class="fa fa-users fa-fw"></i> Инспектори<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/admin/users/create')!!}"><i class='fa fa-plus fa-fw'></i> Добави</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/admin/users')!!}"><i class='fa fa-list-ol fa-fw'></i> Всички инспектори</a>
                                </li>
                            </ul>
                        </li>
                       
                        
                      
                        <li>
                            <a href="{!!URL::to('/админ')!!}"><i class="fa fa-building-o fa-fw"></i> Общини и Населени места<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <!-- <li>
                                    <a href="{!!URL::to('/admin/locations/create')!!}"><i class='fa fa-plus fa-fw'></i> Добави населено място</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/admin/locations-added')!!}"><i class='fa fa-binoculars fa-fw'></i> Виж добавените места!</a>
                                </li> -->
                                @foreach($districts as $district)
                                    <li>
                                        <a href="{!!URL::to('/admin/locations', $district->district_id)!!}"><i class='fa fa-arrow-circle-right fa-fw'></i> {{$district->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li>
                            <a href="{!!URL::to('/админ')!!}"><i class="fa fa-building-o fa-fw"></i> Държави в Европа<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{!!URL::to('/admin/country/create')!!}"><i class='fa fa-plus fa-fw'></i> Добави</a>
                                    </li>
                                    <li>
                                        <a href="{!!URL::to('/admin/countries')!!}"><i class='fa fa-list-ol fa-fw'></i> Всички държави</a>
                                    </li>
                                </ul>
                            </ul>
                        </li>
                       
                    </ul>
                </div>
            </div>

        </nav>

    <div id="page-wrapper">
        @section('message')
        @show
        @yield('content')


    </div>

    </div>

    {!!Html::script("js/jquery.min.js" )!!}
    {!!Html::script("js/bootstrap.min.js" )!!}
    {!!Html::script("js/metisMenu.min.js" )!!}
    {!!Html::script("js/sb-admin-2.js" )!!}


    @section('scripts')

    @show
</body>

</html>
