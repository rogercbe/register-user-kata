<?php

namespace UserRegistration;

interface UserRepository
{
    public function existsUserWithEmail(string $email): bool;

    /**
     * @throws \UserRegistration\EmailAlreadyRegisteredException
     */
    public function save(User $user): void;
}