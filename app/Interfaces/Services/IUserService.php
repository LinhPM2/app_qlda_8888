<?php

namespace App\Interfaces\Services;

use Illuminate\Http\Request;

interface IUserService
{
    public function getUserList();
    public function createUser(Request $request);
    public function findUser(string $id);
    public function editUser(Request $request, string $id);
    public function deleteUser(string $request);
}
