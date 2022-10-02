<?php


namespace Nikservik\AdminDashboard\Components\Icons;


use Illuminate\View\Component;

class Support extends Component
{
    public bool $hasUnread;

    public function __construct(int $countUnread = 0)
    {
        $this->hasUnread = $countUnread > 0;
    }

    public function render()
    {
        return <<<'blade'
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                @if($hasUnread)
                    <circle class="text-red-500" stroke="none" fill="currentColor" cx="19" cy="5" r="5" />
                @endif
            </svg>
        blade;
    }

}
