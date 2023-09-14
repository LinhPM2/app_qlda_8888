<?php

namespace App\Policies;

use App\Models\otherContact;
use App\Models\User;
use App\Models\other_contacts;
use Illuminate\Support\Facades\Gate;


class OtherContactPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, otherContact $otherContacts): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(otherContact $otherContact): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(otherContact $otherContact, otherContact $otherContacts): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(otherContact $otherContact, otherContact $otherContacts): bool
    {
        return Gate::allows("leader-activity") || Gate::allows("admin-activity");
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(otherContact $otherContact, otherContact $otherContacts): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(otherContact $otherContact, otherContact $otherContacts): bool
    {
        return true;
    }
}
