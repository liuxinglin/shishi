<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\BakUserRepositoryEloquent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public $bakUser;
    public $bakUserInfo;
    public function __construct(BakUserRepositoryEloquent $user)
    {
        $this->bakUser = $user;
        $this->middleware('bak.auth');
        $this->middleware(function ($request, $next) {
            $bakUserID = session('bakUserID');
            $this->bakUserInfo = $this->bakUser->find($bakUserID);
            return $next($request);
        });
    }
}
