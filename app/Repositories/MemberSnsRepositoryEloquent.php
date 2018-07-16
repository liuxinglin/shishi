<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MemberSnsRepository;
use App\Models\MemberSns;
use App\Validators\MemberSnsValidator;

/**
 * Class MemberSnsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MemberSnsRepositoryEloquent extends BaseRepository implements MemberSnsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MemberSns::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getMemberSnsDetails($where)
    {
        $result = $this->model->where($where)->first();
        if (!empty($result)) {
            $result = $result->toArray();
        }
        return $result;
    }
}
