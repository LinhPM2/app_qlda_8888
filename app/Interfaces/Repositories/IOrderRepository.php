<?php
    namespace App\Interfaces\Repositories;

use App\Models\Order;
use Illuminate\Http\Request;
    interface IOrderRepository {
        public function all();
        public function create(array $request);
        public function delete(string $id);
        public function update(Order $fields);
        public function Show(string $id):Order;
    }
