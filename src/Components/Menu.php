<?php

namespace Nikservik\AdminDashboard\Components;

use Illuminate\Support\Facades\Config;
use Illuminate\View\Component;

class Menu extends Component
{
    public string $active;
    public array $modules;

    public function __construct(string $active = '')
    {
        $this->active = $active;
        $this->modules = Config::get('admin-dashboard.modules');
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        return view('admin-dashboard::components.menu');
    }

}
