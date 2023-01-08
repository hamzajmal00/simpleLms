<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAuthenticate 
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->type === 'teacher' OR Auth::user()->type === 'admin'){
                return $next($request);
            }else{
                
                return redirect()->route('welcome')->with('error', 'you have no access');
            }
        
            
        }
        else{
            return redirect()->route('login');
        }
    }
}
