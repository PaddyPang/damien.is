<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="@yield('html-class')">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @hasSection('description')
        <meta name="description" content="@yield('description')">
    @else
        <meta name="description" content="Damien Criado is an apps builder, experimenting with new web technologies.">
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-param" content="_token">
    @hasSection('title')
        <title>Damien / @yield('title')</title>
    @else
        <title>Damien Criado</title>
    @endif

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta name="apple-mobile-web-app-title" content="Damien Criado">


    <link rel="apple-touch-icon" sizes="180x180" href="{{ Bust::url('/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ Bust::url('/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ Bust::url('/favicon-16x16.png') }}" sizes="16x16">
    <link rel="manifest" href="{{ Bust::url('/manifest.json') }}">
    <link rel="mask-icon" href="{{ Bust::url('/safari-pinned-tab.svg') }}" color="#6568dd">
    <meta name="theme-color" content="#3a3c83">
    <!--[if IE]>
    <script src="{{ Bust::url('/bower_components/html5shiv/dist/html5shiv.min.js') }}"></script>
    <![endif]-->

    @section('head')
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    @show

    @yield('head-footer')

    @if(app()->environment() === 'production')
        @include('partials.analytics')
    @endif
</head>

<body id="@yield('body-id')" class="@yield('body-class')">
@yield('body')

<!-- Scripts -->
<script src="{{ elixir('js/vendor.js') }}"></script>
<script src="{{ elixir('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
