<?php
namespace App\Interfaces\Services;

interface IAnniversaryDealerService
{
    public function delete($request);
    public function create($request);
    public function edit($request,$dealer);
    public function getAll();
}
