<?php

namespace App\Providers;

use App\Http\ViewComposers\RoleListComposer;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer('share.sidebar.list', 'App\Http\ViewComposers\SidebarComposer');
        view()->composer('admin.users.upsert', RoleListComposer::class);
    }
}
