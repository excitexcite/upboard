@extends('layouts.app')

@section('styles')<%= $.htmlWebpackPlugin.tags.headTags %>@endsection
@section('scripts')<%= $.htmlWebpackPlugin.tags.bodyTags %>@endsection

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="projects-list card">
               <div class="projects-list--header card-header">
                  <h1 class="projects-list--title h5 mb-0">Your projects</h1>
                  <button class="projects-list--new" aria-label="Add Project" title="Add Project">
                     <svg class="svg-icon">
                        <use xlink:href="@icons/add-box"></use>
                     </svg>
                  </button>
               </div>

               <img src="~@/img/logo/logo.svg" alt="">

               <div class="card-body">
                  @if ($projects->isNotEmpty())
                     <ul>
                        @foreach ($projects as $project)
                           <li>{{ $project->name }}</li>
                        @endforeach
                     </ul>
                  @else
                     <p class="mb-0">No any project yet</p>
                  @endif
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
