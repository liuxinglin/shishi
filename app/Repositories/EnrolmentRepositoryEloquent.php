<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\EnrolmentRepository;
use App\Models\Enrolment;
use App\Validators\EnrolmentValidator;

/**
 * Class EnrolmentRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class EnrolmentRepositoryEloquent extends BaseRepository implements EnrolmentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Enrolment::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getEnrolmentList($where, $page = 1, $limit = 10, $total = false)
    {
        $data = [];
        $data['list'] = $this->model->where($where)->skip($page)
            ->take($limit)->orderBy('votes_num', 'DESC')->get()->toArray();
        if ($total) {
            $data['total'] = $this->model->where($where)->count();
        }
        return $data;
    }

    public function getDetails($where)
    {
        $result = $this->model->where($where)->first();
        if (!empty($result)) {
            $result = $result->toArray();
        }
        return $result;
    }

    public function increment($where, $field, $num = 1)
    {
        $result = $this->model->where($where)->increment($field, $num);
        return $result;
    }

    public function getMaxVotes($where)
    {
        $result = $this->model->where($where)->max('votes_num');
        return $result;
    }
}
