<header class="header {{ $class }}">
   <div class="header--container container">
      <a class="header--logo" href="/">
         <img class="header--logo-img svg-icon" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCI+PHBhdGggZmlsbD0iIzE4NWFiZCIgZD0iTTI0LjUgMjkuM0wxNSAzOC44IDEuNiAyNS40YTIgMiAwIDAxMC0yLjhsNi43LTYuN2EyIDIgMCAwMTIuOCAwbDEzLjQgMTMuNHoiLz48bGluZWFyR3JhZGllbnQgaWQ9ImEiIHgxPSIxNC42IiB4Mj0iNDMuMiIgeTE9IjM4LjIiIHkyPSI5LjYiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIj48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9IiM0MTkxZmQiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiM1NWFjZmQiLz48L2xpbmVhckdyYWRpZW50PjxwYXRoIGZpbGw9InVybCgjYSkiIGQ9Ik0xNy44IDQxLjZMMTEuMSAzNWEyIDIgMCAwMTAtMi45TDM3IDYuNGEyIDIgMCAwMTIuOCAwbDYuNyA2LjZjLjguOC44IDIgMCAyLjlMMjAuNiA0MS42YTIgMiAwIDAxLTIuOCAweiIvPjwvc3ZnPgo=">
         UpBoard
      </a>
      <nav class="header-nav header--nav">
         @if (Auth::check())
            {{ Auth::user()->fullName() }}
         @else
            <ul class="header-nav--list">
               <li class="header-nav--item">
                  <a class="header-nav--link" href="{{ route('login') }}">Sign in</a>
               </li>
               <li class="header-nav--item">
                  <a class="header-nav--link" href="{{ route('register') }}">Sign up</a>
               </li>
            </ul>
         @endif
      </nav>
   </div>
</header>
