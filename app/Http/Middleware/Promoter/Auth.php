<?php

namespace App\Http\Middleware\Promoter;

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
        $promID = session('promID');

        //未登录则跳转到登录页面
        if(empty($promID)) {
            return redirect(route('promoter.login'));
        }
        return $next($request);
    }
}
