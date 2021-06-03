@extends('layouts.app')

@section('styles')<%= $.htmlWebpackPlugin.tags.headTags %>@endsection
@section('scripts')<%= $.htmlWebpackPlugin.tags.bodyTags %>@endsection

@section('content')
   <div class="container">
      <h1 class="p--title">Your projects</h1>
      <ul class="p--projects">
         @foreach ($projects as $project)
            <li class="project-card p--project-card">
               <a class="project-card--link"
                  href="/{{ Auth::user()->username }}/{{ $project->slug }}">{{ $project->name }}</a>
            </li>
         @endforeach
         <li class="project-card project-card--new p--project-card">
            <a class="project-card--link" href="/projects/new">
               <svg class="svg-icon">
                  <use xlink:href="@icons/add"></use>
               </svg>
            </a>
         </li>
      </ul>
   </div>
   </div>
@endsection
