<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ProjectRequest;
use App\Http\Requests\Auth\TaskUpdateRequest;
use App\Http\Requests\Auth\TaskRequest;
use App\Models\Project;
use App\Models\Task;
use App\Services\ProjectService;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
   public function create(ProjectRequest $req, ProjectService $projectService)
   {
      $project = new Project();
      $project->name = $req->input('name');
      $project->contract = $req->input('contract');
      $project->contract_type = $req->input('contract_type');
      $project->start_at = $req->input('start_at');
      $project->end_at = $req->input('end_at');

      return $projectService->create($project, Auth::user());
   }

   public function all() {
      return Project::all();
   }

   public function projectTasks(Project $project) {
      return $project->tasks()->get();
   }

   public function addTask(TaskRequest $req, ProjectService $projectService, Project $project)
   {
      $task = new Task();
      $task->name = $req->input('name');
      $task->type = $req->input('type');
      $task->status = $req->input('status');
      $task->estimate = $req->input('estimate');
      $task->start_at = $req->input('start_at');
      $task->end_at = $req->input('end_at');

      return $projectService->addTask($project, $task);
   }

   public function updateTask(TaskUpdateRequest $req, ProjectService $projectService, Task $task) {
      $newTask = new Task();
      $newTask->id = $req->input('id');
      $newTask->name = $req->input('name');
      $newTask->type = $req->input('type');
      $newTask->status = $req->input('status');
      $newTask->estimate = $req->input('estimate');

      return $projectService->updateTask($task, $newTask);
   }
}
