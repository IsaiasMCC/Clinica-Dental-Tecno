<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('font-awesome/css/font-awesome.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/plugins/iCheck/custom.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/plugins/slick/slick.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/plugins/slick/slick-theme.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/animate.css') !!}" rel="stylesheet">
    <link href="{!! asset('css/style.css') !!}" rel="stylesheet">

    <!-- <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet"> -->
    <link href="{!! asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') !!}"
        rel="stylesheet">
    @yield('style')
</head>

<body>
    <div id="wrapper">

        <nav class="navbar-default navbar-static-side" role="navigation" id="menu">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <!-- <img alt="image" class="rounded-circle" src="img/profile_small.jpg" /> -->
                            <img alt="image" class="rounded-circle" src="{!! asset('img/profile_small.jpg') !!}" />
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">Clinica Dental 🦷 </span>
                                {{-- <span class="text-muted text-xs block">Director de Parques y Jardines <b
                                        class="caret"></b></span> --}}
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                                <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                                <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-map"></i> <span class="nav-label">Roles Y Permisos</span><span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{ route('roles.index') }}">Roles</a></li>
                            <li><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-map"></i> <span class="nav-label">Agenda</span><span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{route('citas.index')}}">Cita</a></li>
                            <li><a href="{{route('historials.index')}}">Historial</a></li>
                            <li><a href="{{route('agendas.index')}}">Agenda</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-map"></i> <span class="nav-label">Odontograma</span><span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{route('home')}}">Cita</a></li>
                            <li><a href="{{route('home')}}">Historial</a></li>
                            <li><a href="{{route('odontogramas.index_view')}}">Odonto</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-map"></i> <span class="nav-label">Tratamientos</span><span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{route('home')}}">Recetas</a></li>


                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-map"></i> <span class="nav-label">Pagos</span><span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{route('home')}}">Tratamientos</a></li>
                            <li><a href="{{route('home')}}">Historial</a></li>


                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-map"></i> <span class="nav-label">Reportes</span><span
                                class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            {{-- <li><a href="{{route('home')}}">Recetas</a></li> --}}


                        </ul>
                    </li>


                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                            <i class="fa fa-bars"> </i>
                        </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <a href="{{route('auth.logout')}}">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2> @yield('content_header') </h2>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight white-bg my-4">
                @yield('content')
            </div>
        </div>

    </div>


    <!-- Mainly scripts -->



    <script src="{!! asset('js/jquery-3.1.1.min.js') !!}"></script>
    <script src="{!! asset('js/popper.min.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.js') !!}"></script>
    <script src="{!! asset('js/plugins/metisMenu/jquery.metisMenu.js') !!}"></script>
    <script src="{!! asset('js/plugins/slimscroll/jquery.slimscroll.min.js') !!}"></script>

    <!-- Custom and plugin javascript -->
    <!--   <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script> -->
    <script src="{!! asset('js/inspinia.js') !!}"></script>
    <script src="{!! asset('js/plugins/pace/pace.min.js') !!}"></script>
    <!-- iCheck -->
    <!-- <script src="js/plugins/iCheck/icheck.min.js"></script> -->
    <script src="{!! asset('js/plugins/iCheck/icheck.min.js') !!}"></script>
    <script src="{!! asset('js/plugins/slick/slick.min.js') !!}"></script>

    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
            console.log('se esta ejecuntado!!');
            $('.slick_demo_1').slick({
                dots: true
            });
        });
    </script>

    @yield('script')

</body>

</html>
