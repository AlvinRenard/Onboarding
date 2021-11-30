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
            if (Auth::user()->status == 'Admin') {
              return $next($request);
            }
            elseif (Auth::user()->status == 'Remuneration') {
                return redirect('/ticket');
              }
              elseif (Auth::user()->status == 'Human Resource Development') {
                return redirect('/home');
              }
              else{
                  return redirect('/login');
              }
    }
}