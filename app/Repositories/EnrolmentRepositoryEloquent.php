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

    public function getList($where) {
        $result = $this->model->where($where)->orderBy('votes_num', 'DESC')->get()->toArray();
        return $result;
    }

    public function getDetails($where) {
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
