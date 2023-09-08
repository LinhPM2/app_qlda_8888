<?php
namespace App\Interfaces;

interface IDealerService
{
    public function delete($request);
    public function create($request);
    public function edit($request,$dealer);
}
