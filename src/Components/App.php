<?php

namespace Nikservik\AdminDashboard\Components;

use Illuminate\View\Component;

class App extends Component
{
    public string $active;
    public string $activeSub = '';

    public function __construct(string $active = '', string $activeSub = '')
    {
        $this->active = $active;
        $this->activeSub = $activeSub;
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        return view('admin-dashboard::components.app');
    }

}
