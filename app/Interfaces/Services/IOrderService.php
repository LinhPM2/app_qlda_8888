<?php

namespace App\Interfaces\Services;
use Illuminate\Http\Request;

interface IOrderService
{
    public function list();
    public function create(Request $request);
    public function delete(string $id);
    public function update(Request $payload);
    public function Show(string $id);
}
