<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MemberRepository;
use App\Models\Member;
use App\Validators\MemberValidator;

/**
 * Class MemberRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MemberRepositoryEloquent extends BaseRepository implements MemberRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Member::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getDetails($id)
    {
        $result = $this->model->where('id', $id)->first();
        if (!empty($result)) {
            $result = $result->toArray();
        }
        return $result;
    }
}
