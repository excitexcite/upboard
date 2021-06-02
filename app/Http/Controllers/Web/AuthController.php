<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Models\Project;

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
