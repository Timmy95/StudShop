<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotModerator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
    	if (Auth::guard($guard)->guest() || !$request->user()->isModerator())
    	{
    		//dd('Its alive');
    		return redirect('news');
    	}
        return $next($request);
    }
}
