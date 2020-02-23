<?php

namespace UserRegistration;

class Password
{
    const MIN_LENGTH = 8;
    const SPECIAL_CHARACTER = '_';

    private $password;

    public function __construct(string $password)
    {
        if (strlen($password) < self::MIN_LENGTH) {
            throw new InvalidPasswordException('Must be at least 8 characters long.');
        }

        if (1 !== preg_match('~[0-9]~', $password)) {
            throw new InvalidPasswordException('Must contain at least one number.');
        }

        if (! strpos($password, self::SPECIAL_CHARACTER)) {
            throw new InvalidPasswordException('Must contain special character.');
        }

        $this->password = $password;
    }

    public function __toString(): string
    {
        return $this->password;
    }
}