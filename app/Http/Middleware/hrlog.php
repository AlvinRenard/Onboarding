<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Hrlog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if (Auth::check() && Auth::user()->status == 'Human Resource Development') {
                return $next($request);
              }
              elseif (Auth::check() && Auth::user()->status == 'Admin') {
                return $next($request);
              }
              elseif (Auth::check() && Auth::user()->status == 'Remuneration') {
                return redirect('/ticket');
              }
              else{
                return redirect('/login');
              }
    }
}