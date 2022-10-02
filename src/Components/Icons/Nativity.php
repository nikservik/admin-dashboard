<?php

namespace Nikservik\AdminDashboard\Components\Icons;

use Illuminate\View\Component;

class Nativity extends Component
{
    public function render()
    {
        return <<<'blade'
            <svg xmlns="http://www.w3.org/2000/svg" {{ $attributes }} fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 21h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v14a2 2 0 002 2" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                    d="M4 4L20 20M20 4L4 20M12 4l8 8l-8 8l-8 -8l8 -8" />
            </svg>
        blade;
    }
}
