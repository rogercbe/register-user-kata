<?php

namespace UserRegistration;

class Email
{
    /** @var string */
    private $email;

    /**
     * @throws \UserRegistration\InvalidEmailException
     */
    public function __construct(string $email)
    {
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException('This email is not valid.');
        }

        $this->email = $email;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}