<?php

namespace Mediquo\Tests;

use Mediquo\InvalidPasswordException;
use Mediquo\Password;
use PHPUnit\Framework\TestCase;

class PasswordTest extends TestCase {

    /** @test */
    public function it_have_more_than_8_characters()
    {
        $this->expectException(InvalidPasswordException::class);
        new Password('1234567');
    }


    /** @test */
    public function it_password_contains_underscore()
    {
        $this->expectException(InvalidPasswordException::class);
        new Password('123456789');
    }

}