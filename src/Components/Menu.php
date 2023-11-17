<?php

namespace Nikservik\AdminDashboard\Components;

use Illuminate\Support\Facades\Config;
use Illuminate\View\Component;

class Menu extends Component
{
    public array $submenu = [];
    public string $active;
    public string $activeSub = '';
    public array $modules;

    public function __construct(string $active = '', string $activeSub = '')
    {
        $this->active = $active;
        $this->modules = Config::get('admin-dashboard.modules');
        $this->submenu = $this->getSubmenu($active);

        if ($activeSub) {
            $this->activeSub = $activeSub;
        } else {
            if (count($this->submenu) > 0) {
                $this->activeSub = array_keys($this->submenu)[0];
            }
        }
    }

    protected function getSubmenu(string $module): array
    {
        $routes = Config::get($module.'.menu');

        if (! is_array($routes)) {
            return [];
        }

        if ($module != $this->active) {
            return [];
        }

        $menu = [];

        foreach ($routes as $item => $route) {
            $menu[$item] = '/'.$module.($route ? '/'.$route : '');
        }

        return $menu;
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        return view('admin-dashboard::components.menu');
    }

}
