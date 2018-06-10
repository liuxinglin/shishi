<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\TryoutProductRepository;
use App\Models\TryoutProduct;
use App\Validators\TryoutProductValidator;

/**
 * Class TryoutProductRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TryoutProductRepositoryEloquent extends BaseRepository implements TryoutProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TryoutProduct::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
