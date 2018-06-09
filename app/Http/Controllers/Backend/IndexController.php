<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\BakUserRepositoryEloquent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends BaseController
{
    public function __construct(BakUserRepositoryEloquent $user)
    {
        parent::__construct($user);
    }

    public function index()
    {
        $bakUser = $this->bakUserInfo;
        return view('backend.index', compact('bakUser'));
    }

    public function main()
    {
        return view('backend.main');
    }

}
