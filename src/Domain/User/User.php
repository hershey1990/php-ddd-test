<?php

namespace Domain\User;

use DateTimeImmutable;
use Domain\User\Event\UserRegisteredEvent;

class User
{
    private string $id;
    private string $name;
    private string $email;
    private string $password;
    private DateTimeImmutable $createdAt;
    private array $events = [];

    public function __construct(string $id, string $name, string $email, string $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->createdAt = new DateTimeImmutable();
        
        $this->validate();
        $this->recordEvent(new UserRegisteredEvent($this));
    }

    private function validate(): void
    {
        if (empty($this->name)) {
            throw new \InvalidArgumentException('Name cannot be empty.');
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Invalid email format.');
        }

        if (strlen($this->password) < 8 || !preg_match('/[A-Z]/', $this->password) || !preg_match('/[0-9]/', $this->password) || !preg_match('/[\W]/', $this->password)) {
            throw new \InvalidArgumentException('Password must be at least 8 characters long, contain at least one uppercase letter, one number, and one special character.');
        }
    }

    private function recordEvent($event): void
    {
        $this->events[] = $event;
    }

    public function getEvents(): array
    {
        return $this->events;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }
}