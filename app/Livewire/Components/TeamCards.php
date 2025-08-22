<?php

namespace App\Livewire\Components;

use App\Models\Team;
use Livewire\Component;

class TeamCards extends Component
{
    public $teams;
    public $amount = 3;
    public function render()
    {
        return view('livewire.components.team-cards');
    }

    public function mount() {
        $this->teams = Team::with('media')->take($this->amount)->orderBy('position')->get();
    }

    public function loadAll() {
        $this->amount = 99999;
        $this->teams = Team::with('media')->orderBy('position')->get();
    }
}
