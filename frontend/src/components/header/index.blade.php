<header class="header {{ $class ?? '' }}">
   <div class="header--container">
      <a class="header--logo" href="/">
         <img class="header--logo-img svg-icon" src="~@/img/logo/logo.svg">
         UpBoard
      </a>
      <nav class="header-nav header--nav">
         <ul class="header-nav--list">
            @if (Auth::check())
               <li class="header-nav--item header-nav--item__bg">
                  <button class="header-nav--link logout-js" title="Log out">
                     <svg class="svg-icon">
                        <use xlink:href="@icons/exit"></use>
                     </svg>
                  </button>
               </li>
               <li class="header-nav--item header-nav--item__bg">
                  <a class="header-nav--link" href="{{ route('new-project') }}" title="New Project">
                     <svg class="svg-icon">
                        <use xlink:href="@icons/add"></use>
                     </svg>
                  </a>
               </li>
               <li class="header-nav--item header-nav--item__bg">
                  <a class="header-nav--link" href="{{ route('home') }}" title="Dashboard">
                     <svg class="svg-icon">
                        <use xlink:href="@icons/home"></use>
                     </svg>
                  </a>
               </li>
            @else
               <li class="header-nav--item">
                  <a class="header-nav--link" href="{{ route('login') }}">Sign in</a>
               </li>
               <li class="header-nav--item">
                  <a class="header-nav--link" href="{{ route('register') }}">Sign up</a>
               </li>
            @endif
         </ul>
      </nav>
   </div>
</header>
