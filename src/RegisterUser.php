<?php

namespace Mediquo;

class RegisterUser
{
    public function execute(string $email, string $password): User
    {
        return new User(UserId::generate(), $email, new Password($password));
    }
}