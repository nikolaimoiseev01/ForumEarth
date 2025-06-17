<?php

namespace App\Livewire\Pages\Portal;

use Livewire\Component;

class SpeakersPage extends Component
{
    public $speakers;
    public $experts;
    public function render()
    {
        $this->speakers = \App\Models\Speaker::with('media')->orderBy('position')->where('type', 'спикер')->get();
        $this->experts = \App\Models\Speaker::with('media')->orderBy('position')->where('type', 'спикер')->get();
        return view('livewire.pages.portal.speakers-page');
    }
}
