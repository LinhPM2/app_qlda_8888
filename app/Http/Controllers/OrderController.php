<?php

namespace App\Http\Controllers;

use App\Http\Repositories\OrderRepository;
use App\Http\Service\DealerService;
use App\Interfaces\Services\IDealerService;
use App\Interfaces\Services\IOrderService;
use App\Models\Order;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class OrderController extends Controller
{
    //
    public function __construct(private IOrderService $iorder, private IDealerService $idealer)
    {
    }
    public function index()
    {
        return view('admin.order.list', [
            'title' => 'Danh sách đơn hàng',
            'orders' => $this->iorder->list()
        ]);
    }
    public function selectDealer()
    {
        return view('admin.order.select', [
            'title' => 'Chọn khách hàng',
            'dealers' => $this->idealer->list()
        ]);
    }
    public function add(string $id)
    {
        if ($this->idealer->show($id) != null) {
            return view('admin.order.add', [
                'title' => 'Tạo đơn hàng',
                'id' => request()->id
            ]);
        };
        return redirect(route('order.select'));
    }
    public function store(Request $request)
    {
        $result = $this->iorder->create($request);
        return redirect(route('order'));
    }
    public function edit(String $orderid)
    {
        return view('admin.order.edit', [
            'title' => 'Sửa đơn hàng',
            'order' => $this->iorder->show($orderid)
        ]);
    }
    public function update(Request $req)
    {
        $result = $this->iorder->update($req);
        return redirect(route('order'))->with('success', 'update successfully');
    }
    public function delete(string $id)
    {
        try {
            //code...
            $this->iorder->delete($id);
            return response()->json(['message' => 'Xóa thành công'], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['Error' => $th->getMessage()], 400);
        }
    }
}
