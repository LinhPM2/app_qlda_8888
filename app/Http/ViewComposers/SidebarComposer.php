<?php

namespace App\Http\ViewComposers;

use App\Http\Controllers\Menu\SidebarTabs;
use Illuminate\View\View;

class SidebarComposer
{
    public $tabs = [];
    public function __construct()
    {   
        $this->tabs = [
            new SidebarTabs("Quản lý Đại lý", "/admin/dealer/list"),
        ];
    }
    public function compose(View $view)
    {
        $view->with('list', $this->tabs);
    }
}
