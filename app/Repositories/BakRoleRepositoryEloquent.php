<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BakRoleRepository;
use App\Models\BakRole;
use App\Validators\BakRoleValidator;

/**
 * Class BakRoleRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BakRoleRepositoryEloquent extends BaseRepository implements BakRoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BakRole::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
