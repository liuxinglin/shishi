<?php

namespace App\Http\Middleware\Home;

use Closure;
use URL, Route;

class Auth
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
        $member = session('member');

        //未登录则跳转到登录页面
        if(empty($member)) {
            return redirect(route('auth.index'));
        }
        return $next($request);
    }
}
