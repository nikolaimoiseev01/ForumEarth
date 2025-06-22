<?php

namespace App\Livewire\Pages\Portal;

use Livewire\Component;

class ProgramPage extends Component
{
    public $page;
    public function render()
    {
        $this->page = \App\Models\Page::where('title', 'Программа')->first();
        return view('livewire.pages.portal.program-page');
    }
}
