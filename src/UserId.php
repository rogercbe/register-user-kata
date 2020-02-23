<?php

namespace UserRegistration;

class UserId
{
    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function generate(): self
    {
        return new self(uniqid());
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value();
    }
}