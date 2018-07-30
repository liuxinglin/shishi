<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MemberCouponRepository;
use App\Models\MemberCoupon;
use App\Validators\MemberCouponValidator;

/**
 * Class MemberCouponRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MemberCouponRepositoryEloquent extends BaseRepository implements MemberCouponRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MemberCoupon::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
