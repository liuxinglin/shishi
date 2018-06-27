<?php
/**
 * Created by PhpStorm.
 * User: liuxl
 * Date: 18-6-27
 * Time: 下午3:19
 */

namespace App\Services;


use App\Repositories\CommentRepositoryEloquent;
use Illuminate\Http\Request;

class CommentService
{
    protected $repository;
    public function __construct(CommentRepositoryEloquent $comment)
    {
        $this->repository = $comment;
    }

    public function add(Request $request)
    {
        $data = $request->except('_token');
        $result = $this->repository->create($data);
        return $result;
    }
}