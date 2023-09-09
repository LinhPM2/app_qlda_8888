<?php

namespace App\Http\Controllers\UserMgt;

use App\Http\Controllers\Controller;
use App\Http\Service\UserService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    //
    public function __construct(private UserService $userService)
    {
    }
    public function index()
    {   return view("admin.users.index", [
            "title" => "Users list",
            "users" => $this->userService->getUserList()->toJson(),
        ]);
    }
    public function show(string $id)
    {
    }
    public function create(User $user)
    {
    }
    public function edit(User $user)
    {
    }
    public function delete(string $id)
    {
    }
}
