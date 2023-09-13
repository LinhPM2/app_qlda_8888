<?php
namespace App\Interfaces\Repositories;
use App\Models\User;

interface IUserRepository
{
    public function create(array $user);
    public function edit(User $user);
    public function show(string $id);
    public function delete(string $id);
    public function getList(array $scopeOptions = [],array $sortOptions = [],int $perPage);
}
