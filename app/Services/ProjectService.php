<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class ProjectService {
   public function create(Project $project, User $user) {
      $project->user()->associate($user);
      $project->save();
      return $project;
   }

   public function addTask(Project $project, Task $task) {
      $task->project()->associate($project);
      $task->save();
      return $task;
   }

   public function updateTask(Task $task, Task $newTask) {
      if (isset($newTask->id) && $newTask->id !== $task->id) {
         abort(422, 'Incorrect id');
      }
      if (isset($newTask->name)) {
         $task->name = $newTask->name;
      }
      if (isset($newTask->type)) {
         $task->type = $newTask->type;
      }
      if (isset($newTask->status)) {
         $task->status = $newTask->status;
      }
      if (isset($newTask->estimate)) {
         $task->estimate = $newTask->estimate;
      }
      $task->save();
      return $task;
   }
}
