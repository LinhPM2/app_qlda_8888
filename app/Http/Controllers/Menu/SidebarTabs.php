<?php

namespace App\Http\Controllers\Menu;
class SidebarTabs
{
    public string $path;
    public string $icon;
    public string $name;
    public string $allowUser;
    public function __construct(string $tabName, string $routePath,$allowUser = "USER", string $iconClass = "nav-icon fas fa-solid fa-bars") {
        $this->path = $routePath;
        $this->name = $tabName;
        $this->icon = $iconClass;
        $this->allowUser = $allowUser;
    }
}
