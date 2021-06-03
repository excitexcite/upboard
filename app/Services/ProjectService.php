<?php

namespace App\Services;

use App\Models\Project;
use App\Models\User;

class ProjectService {
   public function create(Project $project, User $user) {
      $project->user()->associate($user);
      $project->save();
      return $project;
   }
}
