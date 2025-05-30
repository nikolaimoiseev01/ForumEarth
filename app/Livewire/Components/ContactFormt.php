<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactFormt extends Component
{

    public $name;
    public $email;
    public $message;
    public $sent = False;

    public function render()
    {
        return view('livewire.components.contact-formt');
    }

    public function send() {

        $email = 'a.klimov@imars.ru';
        Mail::to($email)->send(new \App\Mail\ContactForm($this->name, $this->email, $this->message));
        $this->sent = True;
    }
}
