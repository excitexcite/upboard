<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <link rel="shortcut icon" href="~@/img/logo/logo-48.png">

   <title>@yield('title', config('app.name'))</title>

   @yield('scripts')
   @yield('styles')
</head>

<body class="page">
   @yield('header', View::make('components.header', ['class' => 'page--block']))

   <div class="page--block page--block__content">
      @yield('content')
   </div>
</body>

</html>
