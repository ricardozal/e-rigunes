<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    <link rel="shortcut icon" href="{{asset('')}}" />--}}
    <title>@yield('title', 'Rigunes')</title>
    <!-- Style sheets -->
    @include('web.template.global_css')
    @stack('css')
</head>
<body>
@include('web.components.navbar')
<div class="wrapper">
    @yield('content')
</div>
@include('web.components.footer')
<!-- Javascript -->
@include('web.template.global_js')
@stack('scripts')
</body>
</html>
