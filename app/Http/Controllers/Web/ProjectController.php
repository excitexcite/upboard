<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{

   public function board(string $username, string $project)
   {
      // validate access
      $project = Project::where('slug', $project)->first(); // TODO: search by slug and user
      if (!$project) {
         abort(404, "Project doesn't exist");
      }
      return view('pages.projects.board', [
         'project' => $project,
      ]);
   }

   public function create()
   {
      return view('pages.projects.create');
   }
}
