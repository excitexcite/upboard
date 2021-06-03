<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
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
}
