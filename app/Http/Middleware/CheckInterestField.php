<?php

namespace thebookshelf\Http\Middleware;

use Auth;
use Closure;

class CheckInterestField
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
        if(!Auth::user()->userInterest()->where('deleted',0)->count()){
            return redirect('interest');
        }
        return $next($request);
    }
}
