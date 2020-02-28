<?php

namespace Mediquo\Tests;

use Mediquo\RegisterUser;
use Mediquo\User;
use PHPUnit\Framework\TestCase;
use Mediquo\InvalidPasswordException;

class RegisterUserTest extends TestCase
{
    /** @test */
    public function it_returns_a_user()
    {
        $registerUser = new RegisterUser();

        $user = $registerUser->execute('email', '123456789_');

        $this->assertInstanceOf(User::class, $user);
    }

    /** @test */
    public function it_returns_a_user_with_the_given_params()
    {
        $validPassword = '123456789_';

        $registerUser = new RegisterUser();

        $user = $registerUser->execute('email', $validPassword);

        $this->assertEquals('email', $user->getEmail());
        $this->assertEquals($validPassword, $user->getPassword());
    }
}