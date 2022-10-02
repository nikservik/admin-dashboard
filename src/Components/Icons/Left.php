<?php

namespace Nikservik\AdminDashboard\Components\Icons;

use Illuminate\View\Component;

class Left extends Component
{
    public function render()
    {
        return <<<'blade'
            <svg xmlns="http://www.w3.org/2000/svg" {{ $attributes }} fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        blade;
    }
}
