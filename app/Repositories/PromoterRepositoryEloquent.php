<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PromoterRepository;
use App\Models\Promoter;
use App\Validators\PromoterValidator;

/**
 * Class PromoterRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PromoterRepositoryEloquent extends BaseRepository implements PromoterRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Promoter::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
