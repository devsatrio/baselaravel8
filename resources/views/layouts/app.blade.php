<!DOCTYPE html>
<html>

@php
$data_setting_web = DB::table('setting_web')->orderby('id','desc')->limit(1)->get();
@endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@foreach($data_setting_web as $row_data_setting_web) {{$row_data_setting_web->app_alias}} @endforeach</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    @yield('css')
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @stack('cs_in')
</head>
<body class="hold-transition sidebar-mini @foreach($data_setting_web as $row_data_setting_web) {{$row_data_setting_web->sidebar_mode}} @endforeach">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand @foreach($data_setting_web as $row_data_setting_web) navbar-{{$row_data_setting_web->navbar_color}} @endforeach @foreach($data_setting_web as $row_data_setting_web) navbar-{{$row_data_setting_web->navbar_type}} @endforeach">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">{{ Auth::user()->name }}</span>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-power-off mr-2"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <div class="dropdown-divider"></div>
                        <a href="{{ url('/home/edit-profile') }}" class="dropdown-item">
                            <i class="fas fa-cog mr-2"></i> Edit Akun
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar @foreach($data_setting_web as $row_data_setting_web) sidebar-{{$row_data_setting_web->sidebar_type}}-primary @endforeach elevation-4">
            <a href="{{ url('/home') }}" class="brand-link @foreach($data_setting_web as $row_data_setting_web) navbar-{{$row_data_setting_web->logo_bg_color}} @endforeach">
                @foreach($data_setting_web as $row_data_setting_web) <img src="{{ asset('images/setting/'.$row_data_setting_web->app_logo) }}" alt="brand Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8"> @endforeach
                
                <span class="brand-text font-weight-light @foreach($data_setting_web as $row_data_setting_web) text-{{$row_data_setting_web->brand_type}} @endforeach">@foreach($data_setting_web as $row_data_setting_web) {{$row_data_setting_web->app_name}} @endforeach</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>
                @include('layouts.sidebar')
            </div>
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluit">
                    <div class="row mb-2">
                        <div class="col-sm-12 pl-3">
                            <h1 class="m-0 text-dark"> @yield('template_title')</h1>
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
    @yield('js')
    @stack('js_in')
</body>

</html>
