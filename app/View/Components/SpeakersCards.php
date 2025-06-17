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
    public $main_title;
    public function __construct($speakers, $mainPage, $mainTitle)
    {
        $this->speakers = $speakers;
        $this->main_page = $mainPage;
        $this->main_title = $mainTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.speakers-cards');
    }
}
