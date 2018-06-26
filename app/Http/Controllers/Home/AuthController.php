<?php

namespace App\Http\Controllers\Home;

use App\Services\MemberService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public $service;
    public function __construct(MemberService $member)
    {
        $this->service = $member;
    }

    public function toReg()
    {
        return view('home.auth.register');
    }

    public function register(Request $request)
    {

    }

    public function login(Request $request)
    {
        try {
            $this->service->login($request);
            return response()->json(['status' => true, 'msg' => '登录成功', 'code' => 0]);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage(), 'code' => $e->getCode()]);
        }
    }
}
