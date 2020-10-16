<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    <link rel="shortcut icon" type="image/png" href="">--}}
    <title>@yield('title', 'Admin Rigunes')</title>
    <!-- Style sheets -->
    @include('admin.auth.template.global_css')
    @stack('css')
</head>
<body>

@yield('content')

<!-- Javascript -->
@include('admin.auth.template.global_js')
@stack('scripts')
</body>
</html>
