<?php
namespace App\Interfaces\Services;

interface IDealerService
{
    public function delete($request);
    public function create($request);
    public function edit($request,$dealer);
}
