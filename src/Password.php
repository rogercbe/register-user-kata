<?php

namespace Mediquo;


class Password
{


    private $password;

    public function __construct(string $password)
    {
        if (strlen($password) < 8) {
            throw new InvalidPasswordException();
        }

        if (!strpos($password, '_')) {
            throw new InvalidPasswordException();
        }

        $this->password = $password;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->password;
    }


}