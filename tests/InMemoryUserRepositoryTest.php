<?php

namespace UserRegistration\Tests;

use UserRegistration\Email;
use UserRegistration\InMemoryUserRepository;
use UserRegistration\Password;
use UserRegistration\User;
use UserRegistration\UserId;
use UserRegistration\UserRepository;

class InMemoryUserRepositoryTest extends UserRepositoryTest
{
    function getRepositoryWithEmail($email): UserRepository
    {
        return new InMemoryUserRepository([
            $email => new User(new UserId('123'), new Email($email), new Password('1_valid_password'))
        ]);
    }

    function getEmptyRepository(): UserRepository
    {
        return new InMemoryUserRepository;
    }
}