@extends('layouts.app')

@section('styles')<link href="/dist/styles/pages/home/dashboard.css?" rel="stylesheet">@endsection
@section('scripts')<script defer src="/dist/scripts/pages/home/dashboard..js"></script>@endsection

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="projects-list card">
               <div class="projects-list--header card-header">
                  <h1 class="projects-list--title h5 mb-0">Your projects</h1>
                  <button class="projects-list--new" aria-label="Add Project" title="Add Project">
                     <svg class="svg-icon">
                        <use xlink:href="/dist/sprite.svg?1622351961#add-box"></use>
                     </svg>
                  </button>
               </div>

               <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCI+PHBhdGggZmlsbD0iIzE4NWFiZCIgZD0iTTI0LjUgMjkuM0wxNSAzOC44IDEuNiAyNS40YTIgMiAwIDAxMC0yLjhsNi43LTYuN2EyIDIgMCAwMTIuOCAwbDEzLjQgMTMuNHoiLz48bGluZWFyR3JhZGllbnQgaWQ9ImEiIHgxPSIxNC42IiB4Mj0iNDMuMiIgeTE9IjM4LjIiIHkyPSI5LjYiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIj48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9IiM0MTkxZmQiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiM1NWFjZmQiLz48L2xpbmVhckdyYWRpZW50PjxwYXRoIGZpbGw9InVybCgjYSkiIGQ9Ik0xNy44IDQxLjZMMTEuMSAzNWEyIDIgMCAwMTAtMi45TDM3IDYuNGEyIDIgMCAwMTIuOCAwbDYuNyA2LjZjLjguOC44IDIgMCAyLjlMMjAuNiA0MS42YTIgMiAwIDAxLTIuOCAweiIvPjwvc3ZnPgo=" alt="">

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
