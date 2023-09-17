<?php

namespace App\Http\Repositories;

use App\Interfaces\Repositories\IOrderRepository;
use App\Models\Order;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class OrderRepository implements IOrderRepository

{
    public function all()
    {
        return request()->search ? Order::searchAll()->paginate() : Order::paginate();
    }
    public function create(array $data)
    {
        try {
            Order::create($data);
        } catch (\Throwable $th) {
            throw new Exception(__('ordermng.failed_create_order'), 1);
        }
    }
    public function update(Order $order)
    {
        try {
            $order->save();
        } catch (\Throwable $th) {
            throw new Exception(__('ordermng.failed_update_order'), 1);
        }
    }
    public function show(string $id): Order
    {
        try {
            return Order::find($id);
        } catch (\Throwable $th) {
            throw new ModelNotFoundException(__('ordermng.failed_show_order'), 1);
        }
    }
    public function delete(string $id)
    {
        try {
            Order::destroy($id);
        } catch (\Throwable $th) {
            throw new Exception(__('ordermng.failed_delete_order'), 1);
        }
    }
}
