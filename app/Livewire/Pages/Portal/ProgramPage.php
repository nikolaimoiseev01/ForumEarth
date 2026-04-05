<?php

namespace App\Livewire\Pages\Portal;

use App\Models\Page;
use Livewire\Component;

class ProgramPage extends Component
{
    public $page;
    public function render()
    {
        $this->page = Page::where('title', 'Программа')->first();
        return view('livewire.pages.portal.program-page');
    }
}
