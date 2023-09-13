<?php

namespace App\Http\Service;

use App\Interfaces\Repositories\IUserRepository;
use App\Interfaces\Services\IUserService;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserService implements IUserService
{
    public function __construct(private IUserRepository $userRepository)
    {
    }
    public function getUserList()
    {
        try {
            //code...
            return $this->userRepository->getList([], [], 10);
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
        }
    }
    public function createUser(Request $req)
    {
        try {
            $cre = [
               "name" => $req->input('name'),
               "email" => $req->input('email'),
               "password" => $req->input('password'),
               "roles" => $req->input('roles'),
            ];
            $this->userRepository->create($cre);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 1);
        }
    }
    public function findUser(string $id)
    {
        try {
            return $this->userRepository->show($id);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 1);
        }
    }
    public function editUser(Request $req, string $id)
    {
        try {
            $user = User::find($id);
            $user->name = $req->input('name');
            $user->email = $req->input('email');
            $user->roles = $req->input('roles');
            $this->userRepository->edit($user);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 1);
        }
    }
    public function deleteUser(string $id)
    {
        try {
            $this->userRepository->delete($id);
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage(), 1);
        }
    }
}
