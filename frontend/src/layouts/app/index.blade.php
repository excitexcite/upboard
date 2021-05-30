<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('img/logo/logo-48.png') }}">

    <title>@yield('title', config('app.name'))</title>

    <script src="{{ asset('layouts/app/index.js') }}" defer></script>
    @yield('scripts')

    <link href="{{ asset('css/base.css') }}" rel="stylesheet">
    <link href="{{ asset('layouts/app/index.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>
    @yield('header', View::make('components.header'))

    <div class="page--block page--block__content">
        @yield('content')
    </div>

    @yield('footer', View::make('components.footer'))
</body>

</html>
