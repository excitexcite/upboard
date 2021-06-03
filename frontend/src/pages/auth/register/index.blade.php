@extends('layouts.app')

@section('styles')<%= $.htmlWebpackPlugin.tags.headTags %>@endsection
@section('scripts')<%= $.htmlWebpackPlugin.tags.bodyTags %>@endsection

@section('content')
   <div class="container auth">
      <h1 class="auth--logo">
         <svg src="~@/img/logo/logo.svg" width="32px" height="32px"></svg>
         UpBoard
      </h1>



      <h1>Register</h1>

      <a class="auth--already" href="{{ route('login') }}">Already have an acconunt? Log In</a>
   </div>
@endsection
