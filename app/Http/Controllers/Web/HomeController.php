<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

use App\Models\Project;

class HomeController extends Controller
{
   public function index()
   {
      return (Auth::check()) ? $this->dashboard() : $this->landing();
   }

   private function dashboard()
   {
      return view('pages.home.dashboard', [
         "projects" => Auth::user()->projects()->get(),
      ]);
   }

   private function landing()
   {
      return view('pages.home.landing');
   }
}
