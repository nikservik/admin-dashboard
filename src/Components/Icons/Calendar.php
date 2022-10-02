<?php

namespace Nikservik\AdminDashboard\Components\Icons;

use Illuminate\View\Component;

class Calendar extends Component
{
    public function render()
    {
        return <<<'blade'
            <svg xmlns="http://www.w3.org/2000/svg" {{ $attributes }} fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
        blade;
    }

}
