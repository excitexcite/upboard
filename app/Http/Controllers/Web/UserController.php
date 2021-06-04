<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   public function account(string $username)
   {
      $user = User::where('username', $username)->first();
      if (!$user) {
         abort(404);
      }
      return view('pages.users.account', [
         'user' => $user,
         'private' => $user->is(Auth::user())
      ]);
   }
}
