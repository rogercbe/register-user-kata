<?php

namespace UserRegistration\Tests;

use PHPUnit\Framework\TestCase;
use UserRegistration\InvalidPasswordException;
use UserRegistration\Password;

class PasswordTest extends TestCase
{
    /** @test */
    public function a_valid_password_can_be_created()
    {
        $password = new Password('my_valid_password_2');

        $this->assertEquals('my_valid_password_2', $password);
    }

    /** @test */
    public function it_must_be_8_characters_long()
    {
        $this->expectException(InvalidPasswordException::class);

        new Password('2_short');
    }

    /** @test */
    public function it_must_contain_a_special_character()
    {
        $this->expectException(InvalidPasswordException::class);

        new Password('without-character');
    }

    /** @test */
    public function it_must_contain_a_number()
    {
        $this->expectException(InvalidPasswordException::class);

        new Password('without_character');
    }
}