<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SpeakersCards extends Component
{
    /**
     * Create a new component instance.
     */
    public $speakers;
    public $main_page;
    public function __construct($speakers, $mainPage)
    {
        $this->speakers = $speakers;
        $this->main_page = $mainPage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.speakers-cards');
    }
}
