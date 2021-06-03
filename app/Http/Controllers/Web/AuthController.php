<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
   public function register()
   {
      return view('pages.auth.register');
   }

   public function login()
   {
      return view('pages.auth.login');
   }
}
