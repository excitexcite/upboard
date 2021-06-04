@extends('layouts.app', ['headerClass' => 'header__transparent'])

@section('styles')<%= $.htmlWebpackPlugin.tags.headTags %>@endsection
@section('scripts')<%= $.htmlWebpackPlugin.tags.bodyTags %>@endsection

@section('content')
   <div class="p--controls">
      <div class="p--control">{{ $project->name }}</div>
      <div class="p--control" title="Role">{{ $roleReadable }}</div>
      <button class="p--control invite-js" title="Invite to project">
         <svg class="svg-icon">
            <use xlink:href="@icons/team"></use>
         </svg>
      </button>
      <button class="p--control settings-js" title="Project settings">
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

   <div class="create-task-modal modal modal__slide" id="create-task-modal" aria-hidden="true">
      <div class="modal--overlay" data-micromodal-close tabindex="-1">
         <div class="create-task-modal--container modal--container base-modal--container" role="dialog" aria-modal="true"
            aria-labelledby="create-task-modal--title">

            <header class="base-modal--header">
               <h2 class="create-task-modal--title base-modal--title" id="create-task-modal--title">
                  New Task
               </h2>
               <button class="modal--close base-modal--close" data-micromodal-close aria-label="close modal">
                  <svg class="modal--close-icon svg-icon">
                     <use xlink:href="@icons/close"></use>
                  </svg>
               </button>
            </header>

            <section class="base-modal--content">
               <form class="form form__no-shadow form__no-padding add-task-form-js" action="">
                  <ul class="form--fields">
                     <li class="form--field">
                        <label class="form--label form-label" for="p-name">Title</label>
                        <input class="form--inp form-control form-control" name="name" id="p-name" required>
                     </li>
                     <li class="form--field">
                        <label class="form--label form-label" for="p-status">Status</label>
                        <select class="form--inp form-control" name="status" id="p-status">
                           <option value="new" selected>New</option>
                           <option value="in_progress">In Progress</option>
                           <option value="resolved">Resoleved</option>
                           <option value="feedback">Feedback</option>
                           <option value="closed">Closed</option>
                        </select>
                     </li>
                     <li class="form--field">
                        <label class="form--label form-label" for="p-type">Type</label>
                        <select class="form--inp form-control" name="type" id="p-type">
                           <option value="feature" selected>Feature</option>
                           <option value="bug">Bug</option>
                        </select>
                     </li>
                     <li class="form--field">
                        <label class="form--label form-label" for="p-estimate">Estimate</label>
                        <input class="form--inp form-control" name="estimate" id="p-estimate" type="date">
                     </li>
                     <li class="form--field">
                        <button class="form--go" name="ok">Create Task</button>
                     </li>
                  </ul>
               </form>
            </section>
         </div>
      </div>
   </div>

   <div class="create-task-modal modal modal__slide" id="edit-task-modal" aria-hidden="true">
      <div class="modal--overlay" data-micromodal-close tabindex="-1">
         <div class="create-task-modal--container modal--container base-modal--container" role="dialog" aria-modal="true"
            aria-labelledby="create-task-modal--title">

            <header class="base-modal--header">
               <h2 class="create-task-modal--title base-modal--title" id="create-task-modal--title">
                  Edit Task
               </h2>
               <button class="modal--close base-modal--close" data-micromodal-close aria-label="close modal">
                  <svg class="modal--close-icon svg-icon">
                     <use xlink:href="@icons/close"></use>
                  </svg>
               </button>
            </header>

            <section class="base-modal--content">
               <form class="form form__no-shadow form__no-padding edit-task-form-js" action="">
                  <input name="id" type="hidden">
                  <ul class="form--fields">
                     <li class="form--field">
                        <label class="form--label form-label" for="p-name">Title</label>
                        <input class="form--inp form-control form-control" name="name" id="p-name" required>
                     </li>
                     <li class="form--field">
                        <label class="form--label form-label" for="p-status">Status</label>
                        <select class="form--inp form-control" name="status" id="p-status">
                           <option value="new" selected>New</option>
                           <option value="in_progress">In Progress</option>
                           <option value="resolved">Resoleved</option>
                           <option value="feedback">Feedback</option>
                           <option value="closed">Closed</option>
                        </select>
                     </li>
                     <li class="form--field">
                        <label class="form--label form-label" for="p-type">Type</label>
                        <select class="form--inp form-control" name="type" id="p-type">
                           <option value="feature" selected>Feature</option>
                           <option value="bug">Bug</option>
                        </select>
                     </li>
                     <li class="form--field">
                        <label class="form--label form-label" for="p-estimate">Estimate</label>
                        <input class="form--inp form-control" name="estimate" id="p-estimate" type="date">
                     </li>
                     <li class="form--field">
                        <button class="form--go" name="ok">Save</button>
                     </li>
                  </ul>
               </form>
            </section>
         </div>
      </div>
   </div>
@endsection

@section('template-data')
   <script type="application/json" template-data="project">
      @json($project)

   </script>
   <script type="application/json" template-data="role">
      @json($role)

   </script>
@endsection
