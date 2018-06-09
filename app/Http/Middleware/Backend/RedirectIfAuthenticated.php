<?php

namespace App\Http\Middleware\Backend;

use Closure;

class RedirectIfAuthenticated
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
        $bakUserID = session('bakUserID');
        if(!empty($bakUserID)){
            return redirect(route('backend.index'));
        }
        return $next($request);
    }
}
