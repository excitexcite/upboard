@extends('layouts.app', ['headerClass' => 'header__transparent'])

@section('styles')<%= $.htmlWebpackPlugin.tags.headTags %>@endsection
@section('scripts')<%= $.htmlWebpackPlugin.tags.bodyTags %>@endsection

@section('content')
   <div class="p--controls">
      <div class="p--control">{{ $project->name }}</div>
      <div class="p--control" title="Role">{{ $role }}</div>
      <button class="p--control" title="Project settings">
         <svg class="svg-icon">
            <use xlink:href="@icons/settings"></use>
         </svg>
      </button>
   </div>
   <main class="p--content">
      <ul class="p--lists">
         <li class="p--list board-list" data-status="new">
            <h2 class="board-list--title">New</h2>
            <ul class="board-list--list"></ul>
            <button class="board-list--add add-task-js">
               <svg class="board-list--add-icon svg-icon">
                  <use xlink:href="@icons/add"></use>
               </svg>
               Add another task
            </button>
         </li>
         <li class="p--list board-list" data-status="in_progress">
            <h2 class="board-list--title">In Progress</h2>
            <ul class="board-list--list"></ul>
            <button class="board-list--add add-task-js">
               <svg class="board-list--add-icon svg-icon">
                  <use xlink:href="@icons/add"></use>
               </svg>
               Add another task
            </button>
         </li>
         <li class="p--list board-list" data-status="resolved">
            <h2 class="board-list--title">Resolved</h2>
            <ul class="board-list--list"></ul>
            <button class="board-list--add add-task-js">
               <svg class="board-list--add-icon svg-icon">
                  <use xlink:href="@icons/add"></use>
               </svg>
               Add another task
            </button>
         </li>
         <li class="p--list board-list" data-status="feedback">
            <h2 class="board-list--title">Feedback</h2>
            <ul class="board-list--list"></ul>
            <button class="board-list--add add-task-js">
               <svg class="board-list--add-icon svg-icon">
                  <use xlink:href="@icons/add"></use>
               </svg>
               Add another task
            </button>
         </li>
         <li class="p--list board-list" data-status="closed">
            <h2 class="board-list--title">Closed</h2>
            <ul class="board-list--list"></ul>
            <button class="board-list--add add-task-js">
               <svg class="board-list--add-icon svg-icon">
                  <use xlink:href="@icons/add"></use>
               </svg>
               Add another task
            </button>
         </li>
      </ul>
   </main>
@endsection

@section('template-data')
   <script type="application/json" template-data="project">@json($project)</script>
@endsection
