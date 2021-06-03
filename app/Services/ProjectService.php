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
}
