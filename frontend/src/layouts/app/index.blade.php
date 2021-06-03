<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <link rel="shortcut icon" href="~@/img/logo/logo-48.png">
   <link rel="preconnect" href="https://fonts.gstatic.com">


   <title>@yield('title', config('app.name'))</title>

   @yield('scripts')
   @yield('styles')

   <link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap">
</head>

<body class="page">
   @yield('header', View::make('components.header', ['class' => 'page--block']))

   <div class="page--block page--block__content p">
      @yield('content')
   </div>

   @yield('body-additional')
   @yield('template-data')
</body>

</html>
