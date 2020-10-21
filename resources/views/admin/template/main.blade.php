<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('img/logos/favicon_rigunes.png')}}" />
    <title>@yield('title', 'Rigunes Admin')</title>
    <!-- Style sheets -->
    @include('admin.template.global_css')
    @stack('css')
</head>
<body class="bg-primary-light" style="overflow-x: hidden">
<div class="wrapper">
    <div class="container-fluid">

        <div class="row m-2">
            <div class="col-12">
                <div class="row d-block d-md-none">
                    <div class="col-12 p-0">
                        @include('admin.components.navbar')
                    </div>
                </div>
                <div class="row h-100">
                    <div class="col-md-2 p-0 d-none d-md-block">
                        @include('admin.components.sidebar')
                    </div>
                    <div class="col-12 col-md-10 px-0 pb-5" style="text-align: center">
                        @yield('content')
                    </div>
                </div>
            </div>

        </div>

        @include('admin.components.footer')
    </div>


</div>

<!-- Javascript -->
@include('admin.template.global_js')
@stack('scripts')
</body>
</html>
