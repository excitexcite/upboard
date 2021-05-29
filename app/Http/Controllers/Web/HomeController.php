<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('home.dashboard');
        } else {
            return view('home.landing');
        }
    }
}
