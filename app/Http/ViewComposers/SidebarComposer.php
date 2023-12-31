<?php

namespace App\Http\ViewComposers;

use App\Http\Controllers\Menu\SidebarTabs;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class SidebarComposer
{
    public $tabs = [];
    public function __construct()
    {
        $this->tabs = [
            new SidebarTabs("Quản lý User", "/admin/users/list", __('roles.admin')),
            new SidebarTabs("Quản lý Đại lý", "/admin/dealer/list"),
            new SidebarTabs("Quản lý Groups",route('group')),
            new SidebarTabs("Quản lý đơn hàng",route('order')),
            // new SidebarTabs("Quản lý Liên hệ khác", "/admin/otherContact/list"),
        ];
    }
    public function compose(View $view)
    {
        $view->with('list', $this->PermissionFiltering());
    }
    private function PermissionFiltering(): array
    {
        $filtered = [];
        if (Gate::allows('admin-activity')) { $filtered = $this->tabs; }
        elseif (Gate::allows('leader-activity')) {
            foreach ($this->tabs as $tab) {
                if ($tab->allowUser == __('roles.leader') || $tab->allowUser == __('roles.user')) {
                    array_push($filtered, $tab);
                }
            }}
        else {
            foreach ($this->tabs as $tab) {
                if ($tab->allowUser == __('roles.user')) {
                    array_push($filtered, $tab);
                }
            }
        }
        return $filtered;
    }
}
