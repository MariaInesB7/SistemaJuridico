<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProcAuth
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
        if(auth()->check()){
           if (auth()->user()->rol=='procurador' or auth()->user()->rol=='abogado'){
           
            return $next($request);
        }
        }
        return redirect()->back();
    }
}
