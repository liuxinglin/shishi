<?php

namespace App\Http\Controllers\Home;

use App\Formatters\AppFormatter;
use App\Services\MemberService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public $service;
    public $formatter;
    public function __construct(MemberService $member, AppFormatter $formatter)
    {
        $this->service = $member;
        $this->formatter = $formatter;
    }

    public function index()
    {
        return view('home.auth.index');
    }

    public function register(Request $request)
    {
        try {
            $result = $this->service->register($request);
            if (empty($result)) {
                return response()->json($this->formatter->formatFail(0, [], '注册失败'));
            }
            return response()->json($this->formatter->format($result, '注册成功'));
        } catch (\Exception $e) {
            return response()->json($this->formatter->formatException($e));
        }
    }

    public function login(Request $request)
    {
        try {
            $result = $this->service->login($request);
            return response()->json($this->formatter->format($result, '登录成功'));
        } catch (\Exception $e) {
            return response()->json($this->formatter->formatException($e));
        }
    }
}
