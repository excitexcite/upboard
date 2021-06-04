@extends('layouts.app')

@section('styles')<%= $.htmlWebpackPlugin.tags.headTags %>@endsection
@section('scripts')<%= $.htmlWebpackPlugin.tags.bodyTags %>@endsection

@section('content')
   <div class="container">
      @if ($private)
         <h1>Hello, {{ $user->fullName() }}</h1>
      @else
         <h1>{{ $user->fullName() }}</h1>
      @endif

      <form class="form form form-js" action="">
         <ul class="form--fields">
            <li class="form--field">
               <label class="form--label form-label" for="p-fn">First Name</label>
               <input class="form--inp form-control" name="first_name" id="p-fn"
                  value="{{ $user->first_name }}">
            </li>
            <li class="form--field">
               <label class="form--label form-label" for="p-ln">Last Name</label>
               <input class="form--inp form-control" name="last_name" id="p-ln"
                  value="{{ $user->last_name }}">
            </li>
            @if ($private)
               <li class="form--field">
                  <label class="form--label form-label" for="p-email">Email</label>
                  <input class="form--inp form-control" name="email" id="p-email" type="email" readonly
                     value="{{ $user->email }}">
               </li>
               <li class="form--field">
                  <label class="form--label form-label" for="p-username">Username</label>
                  <input class="form--inp form-control" name="username" id="p-username" readonly
                     value="{{ $user->username }}">
               </li>
               <li class="form--field">
                  <button class="form--go">Save</button>
               </li>
            @endif
         </ul>
      </form>

      <a class="link link__primary logout-js p--logout" href="#">
         Logout
         <svg class="svg-icon">
            <use xlink:href="@icons/exit"></use>
         </svg>
      </a>
   </div>
@endsection

@section('template-data')
   <script type="application/json" template-data="user">
      @json($user)

   </script>
@endsection
