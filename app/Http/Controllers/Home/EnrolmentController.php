<?php

namespace App\Http\Controllers\Home;

use App\Formatters\AppFormatter;
use App\Services\EnrolmentService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EnrolmentController extends Controller
{
    public $service;
    public $formatter;
    public function __construct(EnrolmentService $service, AppFormatter $formatter)
    {
        $this->service = $service;
        $this->formatter = $formatter;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try {
            $result = $this->service->add($request);
            if (empty($result)) {
                return response()->json($this->formatter->formatFail(0, [], '报名失败'));
            }
            return response()->json($this->formatter->format([], '报名成功'));
        } catch (\Exception $e) {
            return response()->json($this->formatter->formatException($e));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = $this->service->getDetails($request);
        return view('home.enrolment.show', compact('data'));
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
}
