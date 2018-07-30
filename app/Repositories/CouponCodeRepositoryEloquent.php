<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CouponCodeRepository;
use App\Models\CouponCode;
use App\Validators\CouponCodeValidator;

/**
 * Class CouponCodeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CouponCodeRepositoryEloquent extends BaseRepository implements CouponCodeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CouponCode::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
