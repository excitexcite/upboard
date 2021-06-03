<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ProjectRequest;
use App\Models\Project;
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
}
