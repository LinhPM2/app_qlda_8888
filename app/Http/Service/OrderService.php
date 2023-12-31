<?php

namespace App\Http\Service;

use App\Interfaces\Repositories\IOrderRepository;
use App\Interfaces\Services\IOrderService;
use Exception;
use Illuminate\Http\Request;

class OrderService implements IOrderService
{
    public function __construct(private IOrderRepository $repo)
    {
    }
    public function list()
    {
        try {
            return $this->repo->all();
        } catch (\Throwable $th) {
            report($th);
        }
    }
    public function create(Request $request)
    {
        $data = [
            'IDDealer' => $request->input("id"),
            'unit' => $request->input("unit"),
            'quantity' => $request->input("quantity"),
            'notes' => $request->input("notes"),
        ];
        try {
            $this->repo->create($data);
        } catch (\Throwable $th) {
            report($th);
        }
    }
    public function delete(string $id)
    {
        try {
            $this->repo->delete($id);
        } catch (\Throwable $th) {
            throw new Exception("Xóa không thành công", 1);

        }
    }
    public function update(Request $req)
    {
        try {
            $target = $this->repo->show($req->input('id'));
            $target->unit = $req->input("unit");
            $target->quantity = $req->input("quantity");
            $target->notes = $req->input("notes");
            $this->repo->update($target);
        } catch (\Throwable $th) {
            report($th);
        }
    }
    public function Show(string $id)
    {
        try {
          return  $this->repo->show($id);
        } catch (\Throwable $th) {
            report($th);
        }
    }

}
