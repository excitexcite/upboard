@extends('layouts.empty')

@section('styles')<%= $.htmlWebpackPlugin.tags.headTags %>@endsection
@section('scripts')<%= $.htmlWebpackPlugin.tags.bodyTags %>@endsection

@section('content')
   <div class="container auth">
      <div class="auth--logo" role="img">
         <img src="~@/img/logo/logo.svg" class="svg-icon">
         UpBoard
      </div>
      <form class="auth--form auth-form auth-form-js" action="">
         <h1 class="auth-form--title">Log in to UpBoard</h1>
         <ul class="auth-form--fields">
            <li class="auth-form--field">
               <label class="auth-form--label form-label" for="log-email">Your email</label>
               <input class="auth-form--inp form-control form-control--inp" name="email" type="email"
                  autocomplete="username" required id="log-email">
            </li>
            <li class="auth-form--field">
               <label class="auth-form--label form-label" for="log-password">Password</label>
               <input class="auth-form--inp form-control form-control--inp" name="password" type="password" required
                  autocomplete="current-password" id="log-password">
            </li>
            <li class="auth-form--field">
               <button class="auth-form--go">Log in</button>
            </li>
         </ul>
         <a class="auth--already" href="{{ route('register') }}">Don't have an account? Sign up</a>
      </form>

   </div>
@endsection
