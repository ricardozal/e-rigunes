<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    <link rel="shortcut icon" href="{{asset('')}}" />--}}
    <title>@yield('title', 'Rigunes Admin')</title>
    <!-- Style sheets -->
    @include('admin.template.global_css')
    @stack('css')
</head>
<body class="bg-primary-light" style="overflow-x: hidden">
<div class="wrapper">
    <div class="container-fluid">
        <div class="row m-0">
            <div class="col-2 p-0">
                @include('admin.components.sidebar')
            </div>
            <div class="col-10 pt-3">
                <div class="card h-100 border-radius">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.components.footer')
<!-- Javascript -->
@include('admin.template.global_js')
@stack('scripts')
</body>
</html>
