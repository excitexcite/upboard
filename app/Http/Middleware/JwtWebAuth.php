<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JwtWebAuth
{
   /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
   public function handle(Request $req, Closure $next)
   {
      if ($token = $req->cookie('token')){
         Auth::setToken($token);
      }
      return $next($req);
   }
}
