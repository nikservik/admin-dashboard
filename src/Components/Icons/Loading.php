<?php

namespace Nikservik\AdminDashboard\Components\Icons;

use Illuminate\View\Component;

class Loading extends Component
{
    public function render()
    {
        return <<<'blade'
            <svg xmlns="http://www.w3.org/2000/svg" {{ $attributes->merge(['class' => 'animate-spin']) }} fill="none" viewBox="0 0 40 40" stroke="currentColor" stroke-width="3">
                <circle class="opacity-30" cx="20" cy="20" r="18"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M38 20c0-9.94-8.06-18-18-18" />
            </svg>
        blade;
    }
}
