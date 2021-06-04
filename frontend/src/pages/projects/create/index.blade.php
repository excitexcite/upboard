@extends('layouts.app')

@section('styles')<%= $.htmlWebpackPlugin.tags.headTags %>@endsection
@section('scripts')<%= $.htmlWebpackPlugin.tags.bodyTags %>@endsection

@section('content')
   <div class="container">
      <h1>Create Project</h1>

      <form class="form form form-js" action="">
         <ul class="form--fields">
            <li class="form--field">
               <label class="form--label form-label" for="p-name">Project name</label>
               <input class="form--inp form-control" name="name" id="p-name" required>
            </li>
            <li class="form--field">
               <label class="form--label form-label" for="p-contract">Contract Number</label>
               <input class="form--inp form-control" name="contract" id="p-contract">
            </li>
            <li class="form--field">
               <label class="form--label form-label" for="p-contract-type">Contract Type</label>
               <input class="form--inp form-control" name="contract_type" id="p-contract-type">
            </li>
            <li class="form--field">
               <label class="form--label form-label" for="p-start-at">Start Date</label>
               <input class="form--inp form-control" name="start_at" id="p-start-at" type="date">
            </li>
            <li class="form--field">
               <label class="form--label form-label" for="p-end-at">End Date</label>
               <input class="form--inp form-control" name="end_at" id="p-end-at" type="date">
            </li>
            <li class="form--field">
               <button class="form--go">Create project</button>
            </li>
         </ul>
      </form>
   </div>
@endsection
