@extends('layouts.empty')

@section('styles')<%= $.htmlWebpackPlugin.tags.headTags %>@endsection
@section('scripts')<%= $.htmlWebpackPlugin.tags.bodyTags %>@endsection

@section('content')
   <main class="p">
      <section class="p-hero">
         <div class="p-hero--nav-container">
            @include('components.header', ['class' => 'p-hero--nav'])
         </div>
         <div class="p-hero--container container">
            <div class="p-hero--content">
               <h1 class="p-hero--title">Welcome to UpBoard!</h1>
               <p class="p-hero--description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia
                  explicabo deserunt ipsum fugit aliquid?</p>
               <button class="p-hero--sign-up">Sign Up for UpBoard</button>
            </div>
         </div>
      </section>

      <section class="p-lorem container">
         <h1 class="p-lorem--title">Lorem ipsum dolor sit amet</h1>
         <p class="p-lorem--description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid ipsa nesciunt
            quae, aperiam sequi illo. Qui nostrum ratione, ut, sunt mollitia dolor asperiores, omnis quis quod ipsum aut
            laudantium cupiditate!</p>
         <p class="p-lorem--description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid ipsa nesciunt
            quae, aperiam sequi illo. Qui nostrum ratione, ut, sunt mollitia dolor asperiores, omnis quis quod ipsum aut
            laudantium cupiditate!</p>
      </section>

      <section class="p-lorem container">
         <h1 class="p-lorem--title">Qui nostrum ratione, ut, sunt mollitia dolor asperiores</h1>
         <p class="p-lorem--description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid ipsa nesciunt
            quae, aperiam sequi illo. Qui nostrum ratione, ut, sunt mollitia dolor asperiores, omnis quis quod ipsum aut
            laudantium cupiditate!</p>
         <p class="p-lorem--description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid ipsa nesciunt
            quae, aperiam sequi illo. Qui nostrum ratione, ut, sunt mollitia dolor asperiores, omnis quis quod ipsum aut
            laudantium cupiditate!</p>
      </section>

      <section class="p-lorem container">
         <h1 class="p-lorem--title">Ipsum dolor sit amet consectetur</h1>
         <p class="p-lorem--description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid ipsa nesciunt
            quae, aperiam sequi illo. Qui nostrum ratione, ut, sunt mollitia dolor asperiores, omnis quis quod ipsum aut
            laudantium cupiditate! Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint quod ipsam nostrum
            obcaecati illum nihil unde consequuntur facilis ullam perspiciatis aliquam quae, nulla autem mollitia,
            voluptate magni sapiente molestias quam!</p>
         <p class="p-lorem--description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid ipsa nesciunt
            quae, aperiam sequi illo. Qui nostrum ratione, ut, sunt mollitia dolor asperiores, omnis quis quod ipsum aut
            laudantium cupiditate!</p>
      </section>

      <section class="p-lorem container">
         <h1 class="p-lorem--title">Lorem ipsum dolor sit</h1>
         <p class="p-lorem--description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid ipsa nesciunt
            quae, aperiam sequi illo. Qui nostrum ratione, ut, sunt mollitia dolor asperiores, omnis quis quod ipsum aut
            laudantium cupiditate!</p>
         <p class="p-lorem--description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid ipsa nesciunt
            quae, aperiam sequi illo. Qui nostrum ratione, ut, sunt mollitia dolor asperiores, omnis quis quod ipsum aut
            laudantium cupiditate!</p>
         <p class="p-lorem--description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid ipsa nesciunt
            quae, aperiam sequi illo. Qui nostrum ratione, ut, sunt mollitia dolor asperiores, omnis quis quod ipsum aut
            laudantium cupiditate!</p>
      </section>

      <footer class="p-footer">
         <div class="p-footer--container container">
            <div class="p-footer-content">
               <ul class="p-footer--list">
                  <li class="p-footer--item">
                     <a class="p-footer--link" href="/terms">Terms</a>
                  </li>
                  <li class="p-footer--item">
                     <a class="p-footer--link" href="/privacy">Privacy</a>
                  </li>
                  <li class="p-footer--item">
                     <a class="p-footer--link" href="/pricing"   >Pricing</a>
                  </li>
               </ul>
               <p class="p-footer--copy">&copy; {{ now()->year }} UpBoard, Inc.</p>
            </div>
         </div>
      </footer>
   </main>
@endsection
