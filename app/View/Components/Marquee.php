<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Marquee extends Component
{
    /**
     * Create a new component instance.
     */
    public $elements;
    public $countries;
    public function __construct($eles, $countries)
    {
        $this->elements = $eles;
        $this->countries = $countries;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.marquee');
    }
}
