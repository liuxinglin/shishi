<?php

namespace App\Http\Controllers\Home;

use App\Formatters\AppFormatter;
use App\Services\CommentService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public $service;
    public $formatter;
    public function __construct(CommentService $comment, AppFormatter $formatter)
    {
        $this->service = $comment;
        $this->formatter = $formatter;
    }

    public function store(Request $request)
    {
        try {
            $result = $this->service->add($request);
            if(empty($result)) {
                return $this->formatter->formatFail(0, [], '评论失败');
            }
            return $this->formatter->format([], '评论成功');
        } catch (\Exception $e) {
            return $this->formatter->formatException($e);
        }
    }
}
