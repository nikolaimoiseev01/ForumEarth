<?php

namespace App\Livewire\Components;

use App\Models\Team;
use Livewire\Component;

class TeamModal extends Component
{
    public $team;

    protected $listeners = ['updateTeam'];
    public function render()
    {
        return view('livewire.components.team-modal');
    }

    public function updateTeam($id) {
        $this->team = Team::where('id', $id)->with('media')->first();
    }
}
