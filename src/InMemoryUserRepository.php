<?php

namespace UserRegistration;

class InMemoryUserRepository implements UserRepository
{
    /** @var array */
    private $users = [];

    public function __construct(array $users = [])
    {
        $this->users = $users;
    }

    public function existsUserWithEmail(string $email): bool
    {
        return count(array_filter($this->users, function (User $user) use ($email) {
            return $user->email() === $email;
        })) === 1;
    }

    /**
     * @throws \UserRegistration\EmailAlreadyRegisteredException
     */
    public function save(User $user): void
    {
        if (array_key_exists($user->email(), $this->users)) {
            throw new EmailAlreadyRegisteredException();
        }

        $this->users[(string) $user->email()] = $user;
    }
}