<?php

namespace UserRegistration;

interface Mailer
{
    /**
     * @param \UserRegistration\User $user
     */
    public function sendWelcomeEmail(User $user): void;
}