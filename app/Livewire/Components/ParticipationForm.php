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
    public $study_place;


    public $birth_dt;
    public $birth_place;
    public $gender = 'Мужской';
    public $citizenship;
    public $passport_number;
    public $passport_issued_date;
    public $passport_issued_by;
    public $passport_code;
    public $address;

    public $topic;

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
            'study_place' => $this->study_place,
            'study_level' => $this->study_level,
            'specialization' => $this->specialization,
            'team' => $this->team,
            'interests' => $this->interests,
            'expertise' => $this->expertise,
            'interest_fact' => $this->interest_fact,
            'birth_dt' => $this->birth_dt,
            'birth_place' => $this->birth_place,
            'gender' => $this->gender,
            'citizenship' => $this->citizenship,
            'passport_number' => $this->passport_number,
            'passport_issued_date' => $this->passport_issued_date,
            'passport_issued_by' => $this->passport_issued_by,
            'passport_code' => $this->passport_code,
            'topic' => $this->topic,
            'address' => $this->address
        ]);

        $this->dispatch('swal:modal',
            title: 'Успешно',
            type: 'success',
            text: "Анкета отправлена!",
        );
    }
}
