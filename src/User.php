<?php

namespace UserRegistration;

class User
{
    /** @var \UserRegistration\UserId */
    private $id;

    /** @var \UserRegistration\Email */
    private $email;

    /** @var \UserRegistration\Password */
    private $password;

    public function __construct(UserId $id, Email $email, Password $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function password(): Password
    {
        return $this->password;
    }
}