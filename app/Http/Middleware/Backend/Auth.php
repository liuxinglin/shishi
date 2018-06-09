<?php

namespace App\Http\Middleware\Backend;

use App\Models\BakRole;
use App\Models\BakUser;
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
        $bakUserID = session('bakUserID');

        //未登录则跳转到登录页面
        if(empty($bakUserID)) {
            return redirect(route('backend.login'));
        }
        $bakUser = BakUser::find($bakUserID);

        //超级管理员直接登录
        if($bakUser['is_super'] == 1) {
            return $next($request);
        }
        //获取当前用户所有权限
        $roles = $bakUser->roles()->get();
        $permissions = [];
        foreach ($roles as $key => $value){
            foreach (BakRole::find($value['id'])->permissions()->get() as $k => $v){
                $permissions[$v['id']] = $v['route'];
            }
        }
        $previousUrl = URL::previous();
        $permission = Route::currentRouteName();
        //判断当前用户角色是否有权限进行操作
        if(!in_array($permission, $permissions)) {
            if($request->ajax() && ($request->getMethod() != 'GET')) {
                return response()->json(['code' => '您没有权限执行此操作', 500]);
            } else {
                return view('errors.403', compact('previousUrl'));
            }
        }
        return $next($request);
    }
}
