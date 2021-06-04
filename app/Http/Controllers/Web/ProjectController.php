<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

   public function board(string $username, string $project)
   {
      // Boards are public by default for now (but only invited users can update)

      $user = User::where('username', $username)->first();
      if (!$user) {
         abort(404, "User doesn't exist");
      }

      $project = Project::where('user_id', $user->id)->where('slug', $project)->first();
      if (!$project) {
         abort(404, "Project doesn't exist");
      }

      $role = $project->getUserRole(Auth::user());

      return view('pages.projects.board', [
         'project' => $project,
         'owner' => $user,
         'isOwner' => $user->is(Auth::user()),
         'role' => $role,
         'roleReadable' => Project::readableRole($role),
      ]);
   }

   public function create()
   {
      return view('pages.projects.create');
   }
}
