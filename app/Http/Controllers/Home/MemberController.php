<?php

namespace App\Http\Controllers\Home;

use App\Formatters\AppFormatter;
use App\Services\MemberService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public $service;
    public $formatter;
    public function __construct(MemberService $member, AppFormatter $formatter)
    {
        $this->service = $member;
        $this->formatter = $formatter;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = session('member.id');
        $member = $this->service->getDetails($id);
        var_dump($id);
        var_dump($member);
        return view('home.member.index', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function bindPhone(Request $request)
    {
        try {
            $result = $this->service->bindPhone($request);
            if (!$result) {
                return response()->json($this->formatter->formatFail(0, [], '绑定手机号码失败'));
            }
            return response()->json($this->formatter->format([], '绑定手机号码成功'));
        } catch (\Exception $e) {
            return response()->json($this->formatter->formatException($e));
        }
    }
}
