<?php

namespace Nikservik\AdminDashboard\Components;

use Illuminate\View\Component;

class App extends Component
{
    public string $active;

    public function __construct(string $active = '')
    {
        $this->active = $active;
    }

    /**
     * @inheritDoc
     */
    public function render()
    {
        return view('admin-dashboard::components.app');
    }

}
