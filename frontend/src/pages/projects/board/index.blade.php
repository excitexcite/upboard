@extends('layouts.app')

@section('styles')<%= $.htmlWebpackPlugin.tags.headTags %>@endsection
@section('scripts')<%= $.htmlWebpackPlugin.tags.bodyTags %>@endsection

@section('content')
   <div class="p--controls">
      <div>Hi, Project: {{ $project->name }}</div>
   </div>
   <main class="p--content">
      <ul class="p--lists">
         <li class="p--list board-list" data-list="new">
            <h2 class="board-list--title">New</h2>
            <ul class="board-list--list">
               <li class="task board-list--task">
                  <p class="task--text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab, eligendi!</p>
               </li>
               <li class="task board-list--task">
                  <p class="task--text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab, eligendi!</p>
               </li>
               <li class="task board-list--task">
                  <p class="task--text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab, eligendi!</p>
               </li>
               <li class="task board-list--task">
                  <p class="task--text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab, eligendi!</p>
               </li>
               <li class="task board-list--task">
                  <p class="task--text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab, eligendi!</p>
               </li>
               <li class="task board-list--task">
                  <p class="task--text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab, eligendi!</p>
               </li>
               <li class="task board-list--task">
                  <p class="task--text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab, eligendi!</p>
               </li>
               <li class="task board-list--task">
                  <p class="task--text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab, eligendi!</p>
               </li>
               <li class="task board-list--task">
                  <p class="task--text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab, eligendi!</p>
               </li>
               <li class="task board-list--task">
                  <p class="task--text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab, eligendi!</p>
               </li>
               <li class="task board-list--task">
                  <p class="task--text">Lorem ipsum dolor sit, amet</p>
               </li>
            </ul>
            <button class="board-list--add">
               <svg class="board-list--add-icon svg-icon">
                  <use xlink:href="@icons/add"></use>
               </svg>
               Add another task
            </button>
         </li>
         <li class="p--list board-list" data-list="in-progres">
            <h2 class="board-list--title">In Progress</h2>
            <ul class="board-list--list"></ul>
            <button class="board-list--add">
               <svg class="board-list--add-icon svg-icon">
                  <use xlink:href="@icons/add"></use>
               </svg>
               Add another task
            </button>
         </li>
         <li class="p--list board-list" data-list="resolved">
            <h2 class="board-list--title">Resolved</h2>
            <ul class="board-list--list">
               <li class="task board-list--task">
                  <p class="task--text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab, eligendi!</p>
               </li>
            </ul>
            <button class="board-list--add">
               <svg class="board-list--add-icon svg-icon">
                  <use xlink:href="@icons/add"></use>
               </svg>
               Add another task
            </button>
         </li>
         <li class="p--list board-list" data-list="feedback">
            <h2 class="board-list--title">Feedback</h2>
            <ul class="board-list--list">
               <li class="task board-list--task">
                  <p class="task--text">Lorem ipsum</p>
               </li>
            </ul>
            <button class="board-list--add">
               <svg class="board-list--add-icon svg-icon">
                  <use xlink:href="@icons/add"></use>
               </svg>
               Add another task
            </button>
         </li>
         <li class="p--list board-list" data-list="closed">
            <h2 class="board-list--title">Closed</h2>
            <ul class="board-list--list">
               <li class="task board-list--task">
                  <p class="task--text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab, eligendi!</p>
               </li>

               <li class="task board-list--task">
                  <p class="task--text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab, eligendi!</p>
               </li>

               <li class="task board-list--task">
                  <p class="task--text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab, eligendi!</p>
               </li>

               <li class="task board-list--task">
                  <p class="task--text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ab, eligendi!</p>
               </li>
            </ul>
            <button class="board-list--add">
               <svg class="board-list--add-icon svg-icon">
                  <use xlink:href="@icons/add"></use>
               </svg>
               Add another task
            </button>
         </li>
      </ul>
   </main>
@endsection
