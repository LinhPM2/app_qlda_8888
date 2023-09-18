<?php

namespace App\Http\Service;

use App\Interfaces\Repositories\IAnniversaryDealerRepository;
use App\Interfaces\Services\IAnniversaryDealerService;

class AnniversaryDealerService implements IAnniversaryDealerService
{
    public function __construct(private IAnniversaryDealerRepository $anniversaryRepo)
    {
    }
    public function delete($request)
    {
        return $this->anniversaryRepo->delete($request);
    }

    public function create($request)
    {
        $this->anniversaryRepo->create($request);
    }

    public function edit($request, $otherContact)
    {
        $this->anniversaryRepo->update($request,$otherContact);
    }

    public function getAll(){
        return $this->anniversaryRepo->getAll();
    }
}
