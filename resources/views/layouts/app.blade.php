<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <link rel="shortcut icon" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAolBMVEUAAABKnv8YWr0YWb5QpvtAkfwLTsFNofwYWr1Vpf9JnftVrP1Sp/xElvxSqP1Oo/1Ln/1Im/5Ojv8we+JBkfxIm/1Uq/0XWb4pcddBkf1VrPxVrP5Ckf5TrP0ZWr0veuEqcNcYWr0XXL4ZWr1Vqv9Ak/9Vqv8YWr1Im/1Tqv1Flv1RqP1LoP1Dlf1Gmf1Ck/1Qpv1OpP1Nov1Knv0ka84eYsYtgIVPAAAAJ3RSTlMAC/tVRf4DwakTRdDBwfb29r4Jj1f28OP99sezs6KbknRsTj4tKA/7vD8+AAABDUlEQVRIx+3P127CQBSEYafYiUmFJKR32oLNgm3e/9WwtJhhRqAj3zO35/+k3ei4QxsNklb9ed+9pW36W+fcVdqqJ2H2M0fC7mci7B7C7u8WCxZ2T+Ld6pdLFn0c/79+kz29iM/t8ex0PL5MpC8KEdcnu72Izn1RiJA+CPRZxkL7RqBnoT1E6MtMhPYQoS9FoP9reojO06QUcbHto+dNCFH3Exbo94FqXvcs0OML6KcBQKCHoH4ugnoVVV4DEuhJoJ+KoF5F5eueBPcqqjjPRXTRqwg9CelVrGLvRXR71Ih48V6E9LqfmAT6g3tgcYP320J7W4Te3ncj0Bt7DIJ7W1Bvilf/0YvaLB1Gx/HW0P1yBQ3eZesAAAAASUVORK5CYII=">

   <title>@yield('title', config('app.name'))</title>

   @yield('scripts')
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
