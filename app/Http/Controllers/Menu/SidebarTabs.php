<?php

namespace App\Http\Controllers\Menu;
class SidebarTabs
{
    public string $path;
    public string $icon;
    public string $name;
    public bool $allowUser = false;
    public function __construct(string $tabName, string $routePath, string $iconClass = "nav-icon fas fa-solid fa-bars", bool $allowUser = false) {
        $this->path = $routePath;
        $this->name = $tabName;
        $this->icon = $iconClass;
        $this->allowUser = $allowUser;
    }
}
