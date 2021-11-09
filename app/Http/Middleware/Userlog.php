<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Userlog
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
            if (Auth::check() && Auth::user()->status == 'admin') {
              return $next($request);
            }
            elseif (Auth::check() && Auth::user()->status == 'remuneration') {
                return redirect('/ticket');
              }
              else{
                  return redirect('/login');
              }
    }
}