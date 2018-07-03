<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\OrderProductRepository;
use App\Models\OrderProduct;
use App\Validators\OrderProductValidator;
use DB;

/**
 * Class OrderProductRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class OrderProductRepositoryEloquent extends BaseRepository implements OrderProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrderProduct::class;
    }

    public function insertAll($data)
    {
        $result = DB::table($this->model->getTable())->insert($data);
        return $result;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
