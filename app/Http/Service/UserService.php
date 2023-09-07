<?php

namespace App\Http\Service;

use App\Interfaces\IUserRepository;

class UserService
{
    public function __construct(private IUserRepository $userRepository )
    {
    }
    public function getUserList(){
        return $this->userRepository->getList([],[],10);
    }
}
