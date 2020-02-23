<?php

namespace UserRegistration;

class UserRegistration
{
    /** @var \UserRegistration\UserRepository */
    private $repository;

    /** @var \UserRegistration\Mailer */
    private $mailer;

    public function __construct(UserRepository $repository, Mailer $mailer)
    {
        $this->repository = $repository;
        $this->mailer = $mailer;
    }

    /**
     * @throws \UserRegistration\InvalidEmailException
     * @throws \UserRegistration\InvalidPasswordException
     * @throws \UserRegistration\EmailAlreadyRegisteredException
     */
    public function register(string $email, string $password): User
    {
        $user = new User(
            UserId::generate(),
            new Email($email),
            new Password($password)
        );

        $this->repository->save($user);

        $this->mailer->sendWelcomeEmail($user);

        return $user;
    }
}