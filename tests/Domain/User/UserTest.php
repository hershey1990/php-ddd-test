<?php

use Domain\User\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserCreation()
    {
        $user = new User('1', 'John Doe', 'john@example.com', 'Password123!');

        $this->assertEquals('1', $user->getId());
        $this->assertEquals('John Doe', $user->getName());
        $this->assertEquals('john@example.com', $user->getEmail());
        $this->assertEquals('Password123!', $user->getPassword());
    }

    public function testInvalidEmail()
    {
        $this->expectException(\InvalidArgumentException::class);
        new User('1', 'John Doe', 'invalid-email', 'Password123!');
    }

    public function testWeakPassword()
    {
        $this->expectException(\InvalidArgumentException::class);
        new User('1', 'John Doe', 'john@example.com', 'weak');
    }
}