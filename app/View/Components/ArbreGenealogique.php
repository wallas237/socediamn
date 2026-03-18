<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ArbreGenealogique extends Component
{
    /**
     * Create a new component instance.
     */
    public string $matriculePied;
    public $generation;
    public function __construct(string $matriculePied, $generation)
    {
        //
        $this->matriculePied = $matriculePied;
        $this->generation = $generation;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.arbre-genealogique');
    }
}
