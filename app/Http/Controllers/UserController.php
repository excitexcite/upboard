<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   protected function all()
   {
      return User::all();
   }

   protected function login(Request $req)
   {
      $token = Auth::attempt([
         'email' => $req->input('email'),
         'password' => $req->input('password'),
      ]);
      if (!$token) {
         abort(403, "Incorrect credentials");
      }
      $user = Auth::user();
      $user->token = $token;
      return $user;
   }

   protected function register(RegisterRequest $req)
   {
      $user = $this->create($req);
      $token = Auth::login($user);
      $user->token = $token;
      return $user;
   }

   protected function create(RegisterRequest $req)
   {
      return User::create([
         'first_name' => $req->first_name,
         'last_name' => $req->last_name,
         'username' => $req->username,
         'email' => $req->email,
         'password' => Hash::make($req->password),
      ]);
   }

   protected function update(UpdateUserRequest $req, User $user)
   {
      if (!$user->is(Auth::user())) {
         abort(403, "You don't have permissions to change this user");
      }

      if ($req->input('first_name') !== null) {
         $user->first_name = $req->input('first_name');
      }
      if ($req->input('last_name') !== null) {
         $user->last_name = $req->input('last_name');
      }
      $user->save();
      return $user;
   }
}
