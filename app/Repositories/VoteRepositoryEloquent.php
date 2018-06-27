<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VoteRepository;
use App\Models\Vote;
use App\Validators\VoteValidator;

/**
 * Class VoteRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class VoteRepositoryEloquent extends BaseRepository implements VoteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Vote::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getDetails($where){
        $result = $this->model->where($where)->first();
        if (!empty($result)) {
            $result = $result->toArray();
        }
        return $result;
    }

    public function getVoteList($where)
    {
        $result = $this->model->where($where)->get()->toArray();
        return $result;
    }

    public function getVoteCount($where)
    {
        $result = $this->model->where($where)->count();
        return $result;
    }

}
