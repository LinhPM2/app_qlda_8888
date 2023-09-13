<?php

namespace App\Http\ViewComposers;

use App\Http\Controllers\Menu\SidebarTabs;
use App\Http\Service\AuthorizeService;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class RoleListComposer
{
    public $tabs = [];
    public function __construct()
    {
        $this->tabs = AuthorizeService::HTML_getRoleList();
    }
    public function compose(View $view)
    {
        $view->with('roles', $this->tabs);
    }

}
