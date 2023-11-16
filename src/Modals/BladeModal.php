<?php

namespace Nikservik\AdminDashboard\Modals;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class BladeModal extends Component
{
    public string $okButtonColor = '';
    public string $okButtonColorHover = '';
    public string $okButtonColorDisabled = '';
    public string $iconBgColor = '';
    public string $title = '';
    public string $okButton = '';
    public string $cancelButton = '';

    public function __construct($okButtonColor, $iconBgColor, $title, $okButton, $cancelButton)
    {
        $this->okButtonColor = $okButtonColor;
        $this->iconBgColor = $iconBgColor;
        $this->title = $title;
        $this->okButton = $okButton;
        $this->cancelButton = $cancelButton;
        $this->okButtonColorHover = Str::beforeLast($okButtonColor, '-') . '-' . (intval(Str::afterLast($okButtonColor, '-')) + 100);
        $this->okButtonColorDisabled = Str::beforeLast($okButtonColor, '-') . '-' . (intval(Str::afterLast($okButtonColor, '-')) - 200);
    }

    public function render()
    {
        return View::make('admin-dashboard::modals.blade-modal');
    }
}
