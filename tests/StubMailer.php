<?php

namespace UserRegistration\Tests;

use UserRegistration\Mailer;
use UserRegistration\User;

class StubMailer implements Mailer
{
    public function sendWelcomeEmail(User $user): void
    {
        //
    }
}