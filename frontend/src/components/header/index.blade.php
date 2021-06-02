<header class="header {{ $class ?? '' }}">
   <div class="header--container">
      <a class="header--logo" href="/">
         <img class="header--logo-img svg-icon" src="~@/img/logo/logo.svg">
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
