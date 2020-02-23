<?php

namespace UserRegistration\Tests;

use UserRegistration\Mailer;
use UserRegistration\User;

class SpyMailer implements Mailer
{
    /** @var bool */
    public $wasCalled = false;

    public function sendWelcomeEmail(User $user): void
    {
        $this->wasCalled = true;
    }
}