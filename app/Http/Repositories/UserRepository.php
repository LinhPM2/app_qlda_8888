<?php

namespace App\Http\Repositories;

use App\Interfaces\IUserRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements IUserRepository
{
    private $currentUser;
    public function __construct()
    {
        $this->currentUser = Auth::user();
    }
    public function getList($scopeOptions = [], $sortOptions = [], int $perPage)
    {
        return User::paginate($perPage);
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
