<?php

namespace App\Policies;

use App\Models\dealer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class DealerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(dealer $dealer): bool
    {
        return true;
    }

    /**
     * Determine whether the dealer can view the model.
     */
    public function view(dealer $dealer, dealer $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(dealer $dealer): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(dealer $dealer, dealer $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(dealer $dealer, dealer $model): bool
    {
        return Gate::allows("leader-activity") || Gate::allows("admin-activity");
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(dealer $dealer, dealer $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(dealer $dealer, dealer $model): bool
    {
        return true;
    }
}
