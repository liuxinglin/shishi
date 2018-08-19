<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\OrderRepository;
use App\Models\Order;
use App\Validators\OrderValidator;

/**
 * Class OrderRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getOrderList($where, $page = 0, $limit = 15)
    {
        return $this->model->with('product')->where($where)->get()->toArray();
    }

    public function getOrderInfo($id)
    {
        $result = $this->model->with('product')->where('order_id', $id)->first();
        if (!empty($result)) {
            $result = $result->toArray();
        }
        return $result;
    }

    public function updateCommentStatus($order_id, $status)
    {
        return $this->model->where('order_id', $order_id)->update(['is_comment' => $status]);
    }

    public function update(array $attributes, $id)
    {
        // TODO: Implement update() method.
        return $this->model->where('order_id', $id)->update($attributes);
    }
}
