<?php

namespace App\Http\Repositories;

use App\Interfaces\Repositories\IUserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements IUserRepository
{
    public function getList($scopeOptions = [], $sortOptions = [], int $perPage)
    {
        return User::paginate($perPage)->withQueryString();
    }
    public function show(string $id)
    {
        return User::findOrFail($id);
    }

    public function create(array $cre)
    {
        User::create($cre);
    }
    public function edit(User $user)
    {
        $user->save();
    }
    public function delete(string $id)
    {
        User::destroy($id);
    }
}
