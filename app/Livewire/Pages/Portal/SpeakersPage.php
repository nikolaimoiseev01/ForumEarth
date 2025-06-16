<?php

namespace App\Livewire\Pages\Portal;

use Livewire\Component;

class SpeakersPage extends Component
{
    public $speakers;
    public function render()
    {
        $this->speakers = \App\Models\Speaker::with('media')->orderBy('position')->get();
        return view('livewire.pages.portal.speakers-page');
    }
}
