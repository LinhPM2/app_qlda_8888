<?php

namespace App\Http\Controllers\UserMgt;

use App\Http\Controllers\Controller;
use App\Http\Service\UserService;
use Illuminate\Http\Request;
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
            "users" => $this->userService->getUserList(),
        ]);
    }
    public function show(string $id)
    {
        return view("admin.users.upsert", [
            "title" => "Update an user",
            "form_target" => route('users.edit', ['id' => $id]),
            "user" => $this->userService->findUser($id),
            "method" => "PATCH",
        ]);
    }

    public function create()
    {
        return view("admin.users.upsert", [
            "title" => "Register an user",
            "form_target" => route('users.store'),
            "method" => "POST",
        ]);
    }
    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required|unique:users,name|max:100|bail',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|max:255|confirmed',
            'roles' => 'required',
        ]);
        try {
            $this->userService->createUser($req);
            session()->flash('success', __('usermng.success_create_user'));
            return to_route('users.list');
        } catch (\Throwable $th) {
            session()->flash('error', __('usermng.failed_create_user'));
            return new HttpException(400, $th->getMessage());
        }
    }
    public function edit(Request $req, string $id)
    {
        try {
            $req->validate([
                'name' => 'required',
                'email' => 'required|email',
                'roles' => 'required',
            ]);
            $this->userService->editUser($req, $id);
            session()->flash('success', __('usermng.success_edit'));
            return to_route('users.list');
        } catch (\Throwable $th) {
            return  to_route('users.list')->withErrors([__('usermng.failed_update_user')]);
        }
    }
    public function delete(string $id)
    {
        try {
            $this->userService->deleteUser($id);
            return response()->json([ 'message' => __('usermng.success_delete_user') ], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => __('usermng.failed_delete_user')], 400);
        }
    }
}
