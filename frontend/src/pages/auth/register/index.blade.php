@extends('layouts.app')

@section('styles')<%= $.htmlWebpackPlugin.tags.headTags %>@endsection
@section('scripts')<%= $.htmlWebpackPlugin.tags.bodyTags %>@endsection

@section('content')
   <div class="container">
      <h1>Register</h1>
   </div>
@endsection
