<?php

namespace App\Livewire\Components;

use App\Models\Participant;
use Livewire\Component;

class ParticipationForm extends Component
{
    public $fio;
    public $telephone;
    public $email;
    public $region;
    public $workplace;
    public $status = 'Студент';
    public $study_level;
    public $specialization;
    public $team;
    public $interests;
    public $expertise;
    public $interest_fact;

    public function render()
    {
        return view('livewire.components.participation-form');
    }


    public function register()
    {

        Participant::create([
            'fio' => $this->fio,
            'telephone' => $this->telephone,
            'email' => $this->email,
            'region' => $this->region,
            'workplace' => $this->workplace,
            'status' => $this->status,
            'study_level' => $this->study_level,
            'specialization' => $this->specialization,
            'team' => $this->team,
            'interests' => $this->interests,
            'expertise' => $this->expertise,
            'interest_fact' => $this->interest_fact
        ]);

        $this->dispatch('swal:modal',
            title: 'Успешно',
            type: 'success',
            text: "Анкета отпарвлена!",
        );
    }
}
