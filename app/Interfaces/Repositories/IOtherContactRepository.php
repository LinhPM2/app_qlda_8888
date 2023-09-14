<?php

namespace App\Interfaces\Repositories;

interface IOtherContactRepository
{
    public function create($request);
    public function update($request, $dealer);
    public function delete($request);
    public function getAll();
}
