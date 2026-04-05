<?php

namespace App\Livewire\Pages\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class VerificationPendingPage extends Component
{
    public $retrySent;
    public function resendVerificationEmail()
    {
        if (Auth::user() && !Auth::user()->hasVerifiedEmail()) {
            Auth::user()->sendEmailVerificationNotification();
            $this->retrySent = true;
        }
    }

    public function render()
    {
        return view('livewire.pages.auth.verification-pending-page')
            ->layout('layouts.portal');
    }
}
