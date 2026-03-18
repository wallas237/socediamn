<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DialogAlert extends Component
{
    /**
     * Create a new component instance.
     */
    public  $message;
    public  $color;
    public function __construct(string $color, string $message)
    {
        $this->message = $message;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dialog-alert');
    }
}
