<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
    

            if(\auth::user()->role=='admin')
            {
                
                return $next($request);
            }
            else
            {
                
                return redirect('/')->with('status' ,'you are not login to admin pannel');
            }
        
    }
}
