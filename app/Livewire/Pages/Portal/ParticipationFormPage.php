<?php

namespace App\Livewire\Pages\Portal;

use App\Models\Journalist;
use App\Models\Participant;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class ParticipationFormPage extends Component
{

    public function render()
    {
        return view('livewire.pages.portal.participation-form-page');
    }

}
