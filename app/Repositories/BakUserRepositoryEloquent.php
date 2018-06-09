<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BakUserRepository;
use App\Models\BakUser;
use App\Validators\BakUserValidator;

/**
 * Class BakUserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BakUserRepositoryEloquent extends BaseRepository implements BakUserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BakUser::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
