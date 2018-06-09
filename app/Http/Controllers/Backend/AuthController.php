<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\BakUserRepositoryEloquent;
use App\Tool\BLogger;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public $bakUser;
    public function __construct(BakUserRepositoryEloquent $bakUser)
    {
        $this->bakUser = $bakUser;
    }

    public function toLogin()
    {
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->except('_token');
//        if(empty($data['username'])){
//            return response()->json(['code' => 404, 'msg' => '账号不能为空']);
//        }
        try {
            $result = $this->bakUser->findWhere(['username' => $data['username']])->toArray();
            if(empty($result)) {
                return response()->json(['code' => 404, 'msg' => '不存在该账号']);
            }

            $user = $result['0'];
            if($user['password'] != $data['password']) {
                return response()->json(['code' => 404, 'msg' => '密码错误']);
            }

            if($user['status'] == 0) {
                return response()->json(['code' => 404, 'msg' => '该账号已被禁用']);
            }
            session(['bakUserID' => $user['id']]);
            //登录成功更新信息
            $upInfo = [
                'last_login_time' => $user['signed_at'],
                'last_login_ip' => $user['signed_ip'],
                'signed_at' => date('Y-m-d H:i:s'),
                'signed_ip' => $request->getClientIp()
            ];

            $this->bakUser->update($upInfo, $user['id']);
            return response()->json(['code' => 0, 'msg' => '登录成功', 'data' => ['url' => route('backend.index')]]);
        } catch (\Exception $e) {
            echo $e;
            BLogger::getLogger('login')->info($e->getMessage());
            return response()->json(['code' => 500, 'msg' => '服务器异常']);
        }
    }

    /**
     * 退出登录
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\think\response\Redirect
     */
    public function logout(Request $request)
    {
        $request->session()->forget('bakUserID');
        return redirect(route('backend.login'));
    }
}
