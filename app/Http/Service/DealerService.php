<?php

namespace App\Http\Service;

use App\Interfaces\Repositories\IDealerRepository;
use App\Interfaces\Services\IDealerService;

class DealerService implements IDealerService
{
    public function __construct(private IDealerRepository $dealerRepo)
    {
    }
    public function delete($request)
    {
        return $this->dealerRepo->delete($request);
    }

    public function create($request)
    {
        $this->dealerRepo->create($request);
    }

    public function edit($request, $dealer)
    {
        $this->dealerRepo->update($request,$dealer);
    }

    public function getAll()
    {
        return $this->dealerRepo->getAll();
    }
}
