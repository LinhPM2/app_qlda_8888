<?php

namespace App\Interfaces\Repositories;

interface IDealerRepository
{
    public function create($request);
    public function update($request, $dealer);
    public function delete($request);
}
