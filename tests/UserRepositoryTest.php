<?php

namespace UserRegistration\Tests;

use PHPUnit\Framework\TestCase;
use UserRegistration\Email;
use UserRegistration\Password;
use UserRegistration\User;
use UserRegistration\UserRepository;

abstract class UserRepositoryTest extends TestCase
{
    abstract function getEmptyRepository(): UserRepository;

    abstract function getRepositoryWithEmail($email): UserRepository;

    /** @test */
    public function it_knows_if_an_email_is_already_registered()
    {
        $email = 'email@exists.com';
        $repository = $this->getRepositoryWithEmail($email);

        $this->assertTrue($repository->existsUserWithEmail($email));
    }

    /** @test */
    public function it_registers_a_new_user()
    {
        $user = new User('id', new Email('my-email@gmail.com'), new Password('my_valid_1_pw'));
        $repo = $this->getEmptyRepository();

        $repo->save($user);

        $this->assertTrue($repo->existsUserWithEmail('my-email@gmail.com'));
    }
}