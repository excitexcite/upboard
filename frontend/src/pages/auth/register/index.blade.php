@extends('layouts.empty')

@section('styles')<%= $.htmlWebpackPlugin.tags.headTags %>@endsection
@section('scripts')<%= $.htmlWebpackPlugin.tags.bodyTags %>@endsection

@section('content')
   <div class="container auth">
      <div class="auth--logo" role="img">
         <img src="~@/img/logo/logo.svg" class="svg-icon">
         UpBoard
      </div>
      <form class="auth--form auth-form" action="">
         <h1 class="auth-form--title">Sign up for your account</h1>
         <ul class="auth-form--fields">
            <li class="auth-form--field">
               <label class="auth-form--label form-label" for="reg-email">Your email</label>
               <input class="auth-form--inp form-control form-control--inp" type="email" name="email"
                  autocomplete="username" id="reg-email" required>
            </li>
            <li class="auth-form--field">
               <label class="auth-form--label form-label" for="reg-username">Your username</label>
               <input class="auth-form--inp form-control form-control--inp" name="username" autocomplete="username"
                  id="reg-username" required>
            </li>
            <li class="auth-form--field">
               <label class="auth-form--label form-label" for="reg-password">Password</label>
               <input class="auth-form--inp form-control form-control--inp" name="password" autocomplete="new-password"
                  type="password" required id="reg-password">
            </li>
            <li class="auth-form--field">
               <button class="auth-form--go">Register</button>
            </li>
         </ul>
         <a class="auth--already" href="{{ route('login') }}">Already have an acconunt? Log In</a>
      </form>

   </div>
@endsection
