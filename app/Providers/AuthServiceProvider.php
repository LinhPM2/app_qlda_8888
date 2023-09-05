<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Http\Service\AuthorizeService;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //them cac policies cho class tuong ung vao day
        User::class => UserPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        Gate::before(function () {
            return AuthorizeService::isAdmin();
        });
        Gate::define('admin-activity',function (){
            return AuthorizeService::isAdmin() ? Response::allow() : Response::denyWithStatus(403);
        });
        Gate::define('leader-activity',function (){
            return AuthorizeService::isLeader() ? Response::allow() : Response::denyWithStatus(403);
        });
    }
}
