<?php

namespace App\Http\Middleware;

use Closure;
use App\Auction;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAuthor
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
    	$page_id = $request->segment(2);
    	$auction = Auction::find($page_id);
        if (!Auth::guard($guard)->guest() && ($request->user()->isModerator() || $request->user()->id == $auction->user_id))
    	{
    		return $next($request);
    	}
    	return redirect('auctions');
    }
}
