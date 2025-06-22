<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UniversitySlider extends Component
{
    /**
     * Create a new component instance.
     */
    public $universities;
    public $countries;
    public function __construct($universities, $countries)
    {
        $this->universities = $universities;
        $this->countries = $countries;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.university-slider');
    }
}
