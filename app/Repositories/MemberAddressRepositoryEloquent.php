<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MemberAddressRepository;
use App\Models\MemberAddress;
use App\Validators\MemberAddressValidator;

/**
 * Class MemberAddressRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MemberAddressRepositoryEloquent extends BaseRepository implements MemberAddressRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return MemberAddress::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
