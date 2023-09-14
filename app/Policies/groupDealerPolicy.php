<?php

namespace App\Policies;

use App\Models\User;
use App\Models\groupDealer;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class groupDealerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        return Gate::allows('admin-activity');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, groupDealer $groupDealer): bool
    {
        //
        return Gate::allows('admin-activity');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        return Gate::allows('admin-activity');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, groupDealer $groupDealer): bool
    {
        //
        return Gate::allows('admin-activity');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, groupDealer $groupDealer): bool
    {
        //
        return Gate::allows('admin-activity');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, groupDealer $groupDealer): bool
    {
        //
        return Gate::allows("leader-activity") || Gate::allows("admin-activity");
    }


    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, groupDealer $groupDealer): bool
    {
        //
        return Auth::user()->id == $groupDealer->id ? false : Gate::allows('admin-activity');
    }
}
