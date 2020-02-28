<?php

namespace Mediquo;


class User
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var Password
     */
    private $password;
    /**
     * @var UserId
     */
    private $id;

    public function __construct(UserId $id, string $email, Password $password)
    {
        $this->email = $email;
        $this->password = $password;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return Password
     */
    public function getPassword(): Password
    {
        return $this->password;
    }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }

}