<?php

namespace Nikservik\AdminDashboard\Components\Icons;

use Illuminate\View\Component;

class Info extends Component
{
    public function render()
    {
        return <<<'blade'
            <svg xmlns="http://www.w3.org/2000/svg" {{ $attributes }} fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
        blade;
    }
}
