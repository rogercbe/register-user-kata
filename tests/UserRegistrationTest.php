<?php

namespace UserRegistration\Tests;

use UserRegistration\Email;
use UserRegistration\EmailAlreadyRegisteredException;
use UserRegistration\InMemoryUserRepository;
use UserRegistration\InvalidEmailException;
use PHPUnit\Framework\TestCase;
use UserRegistration\InvalidPasswordException;
use UserRegistration\Password;
use UserRegistration\User;
use UserRegistration\UserId;
use UserRegistration\UserRegistration;

class UserRegistrationTest extends TestCase
{
    /** @test */
    public function a_user_can_register_to_the_system()
    {
        $email = 'email@test.com';
        $password = 'pass_word_1';
        $userRegistration = new UserRegistration(
            new InMemoryUserRepository,
            new StubMailer
        );

        $user = $userRegistration->register($email, $password);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($email, $user->email());
        $this->assertEquals($password, $user->password());
    }

    /** @test */
    public function should_throw_an_exception_if_password_is_not_valid()
    {
        $email = 'email@is.valid';
        $password = 'wrong';
        $userRegistration = new UserRegistration(
            new InMemoryUserRepository,
            new StubMailer
        );

        $this->expectException(InvalidPasswordException::class);
        $userRegistration->register($email, $password);
    }

    /** @test */
    public function should_throw_an_exception_if_email_is_not_valid()
    {
        $email = 'email';
        $password = 'password_';
        $userRegistration = new UserRegistration(
            new InMemoryUserRepository,
            new StubMailer
        );

        $this->expectException(InvalidEmailException::class);
        $userRegistration->register($email, $password);
    }

    /** @test */
    public function it_should_generate_a_random_id_for_the_user()
    {
        $email = 'email@test.com';
        $password = 'pass_word_1';
        $userRegistration = new UserRegistration(
            new InMemoryUserRepository,
            new StubMailer
        );

        $user = $userRegistration->register($email, $password);

        $this->assertEquals('1', (string) $user->id());
    }

    /** @test */
    public function it_should_throw_an_exception_if_email_is_registered()
    {
        $email = 'email@test.com';
        $password = 'pass_word_1';

        $userRegistration = new UserRegistration(
            new InMemoryUserRepository([
                $email => new User(new UserId('123'), new Email($email), new Password('1_valid_password'))
            ]),
            new StubMailer
        );

        $this->expectException(EmailAlreadyRegisteredException::class);
        $userRegistration->register($email, $password);
    }

    /** @test */
    public function it_sends_a_welcome_email_when_user_is_registered()
    {
        $mailer = new SpyMailer;
        $email = 'email@test.com';
        $password = 'pass_word_1';
        $userRegistration = new UserRegistration(
            new InMemoryUserRepository,
            $mailer
        );

        $user = $userRegistration->register($email, $password);

        $this->assertTrue($mailer->wasCalled);
    }
}