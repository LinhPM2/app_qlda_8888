<?php

namespace App\Http\Service;

use App\Interfaces\Repositories\IOtherContactRepository;
use App\Interfaces\Services\IOtherContactService;

class OtherContactService implements IOtherContactService
{
    public function __construct(private IOtherContactRepository $contactRepo)
    {
    }
    public function delete($request)
    {
        return $this->contactRepo->delete($request);
    }

    public function create($request)
    {
        $this->contactRepo->create($request);
    }

    public function edit($request, $otherContact)
    {
        $this->contactRepo->update($request,$otherContact);
    }

    public function getAll(){
        return $this->contactRepo->getAll();
    }
}
