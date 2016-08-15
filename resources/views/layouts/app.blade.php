<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="@yield('html-class')">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token">
    <title>
        @hasSection('title')
        Damien / @yield('title')
        @else
            Damien Criado
        @endif
    </title>

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Damien Criado">

    <link rel="apple-touch-icon" href="/images/apple-touch-icon.png"/>
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico"/>
    <!--[if IE]>
    <script src="/bower_components/html5shiv/dist/html5shiv.min.js"></script>
    <![endif]-->

    @section('head')
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    @show

    @yield('head-footer')
</head>

<body id="@yield('body-id')" class="@yield('body-class')">
@yield('body')

<!-- Scripts -->
<script src="{{ elixir('js/vendor.js') }}"></script>
<script src="{{ elixir('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
