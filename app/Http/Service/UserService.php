<?php

namespace App\Http\Service;

use App\Interfaces\Repositories\IUserRepository;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserService
{
    public function __construct(private IUserRepository $userRepository )
    {
    }
    public function getUserList(){
        try {
            //code...
            return $this->userRepository->getList([],[],10);
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }
    public function createUser(Request $req){
        try {
            $user = new User;
            $user->name = $req->input('name');
            $user->email = $req->input('email');
            $user->password = $req->input('password');
            $user->roles = $req->input('roles');
            $this->userRepository->create($user);
        } catch (\Throwable $th) {
           throw new Exception($th->getMessage(), 1);
        }
    }
    public function findUser(string $id){
        try {
            $this->userRepository->show($id);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 1);
        }
    }
}
