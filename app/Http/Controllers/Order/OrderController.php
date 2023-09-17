<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Interfaces\Repositories\IOrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct(private IOrderRepository $orderRepo)
    {
    }
    public function index()
    {
    }
    public function show()
    {
    }
    public function create()
    {
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
