<?php

namespace App\Http\Controllers\UserMgt;

use App\Http\Controllers\Controller;
use App\Http\Service\UserService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }
    public function index()
    {
        return view("admin.users.index", [
            "title" => "Users list",
            "users" => $this->userService->getUserList()->toJson(),
        ]);
    }
    public function show(string $id)
    {
    }

    public function create()
    {
        return view("admin.users.upsert", [
            "title" => "Register an user",
            "form_target" => route('users.store'),
        ]);
    }
    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|unique:Users,name|max:100|bail',
            'email' => 'required|email|max:100|unique:Users,email',
            'password' => 'required|max:255|confirmed',
            'roles' => 'required',
        ]);
        try {
            $this->userService->createUser($req);
            session()->flash('Success', __('usermng.success_create_user'));
            return to_route(route('users.list'));
        } catch (\Throwable $th) {
            return new HttpException(400, $th->getMessage());
        }
    }
    public function edit(User $user)
    {
    }
    public function delete(string $id)
    {
    }
}
