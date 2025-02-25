<?php

namespace Domain\User;

class UserFactory
{
    public function create(string $name, string $email, string $password): User
    {
        // Validate the input data
        $this->validate($name, $email, $password);

        // Create a new User instance
        return new User(
            UserId::generate(),
            $name,
            $email,
            password_hash($password, PASSWORD_BCRYPT),
            new \DateTimeImmutable()
        );
    }

    private function validate(string $name, string $email, string $password): void
    {
        if (empty($name) || empty($email) || empty($password)) {
            throw new \InvalidArgumentException('Name, email, and password are required.');
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Invalid email format.');
        }

        if (strlen($password) < 6) {
            throw new \InvalidArgumentException('Password must be at least 6 characters long.');
        }
    }
}