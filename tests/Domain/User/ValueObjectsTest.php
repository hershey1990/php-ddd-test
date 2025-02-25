<?php

use Domain\User\Email;
use Domain\User\Name;
use Domain\User\Password;
use Domain\User\UserId;
use PHPUnit\Framework\TestCase;

class ValueObjectsTest extends TestCase
{
    public function testValidEmail()
    {
        $email = new Email('john@example.com');
        $this->assertEquals('john@example.com', (string)$email);
    }

    public function testInvalidEmail()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email('invalid-email');
    }

    public function testValidName()
    {
        $name = new Name('John Doe');
        $this->assertEquals('John Doe', (string)$name);
    }

    public function testInvalidName()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Name('Jo');
    }

    public function testValidPassword()
    {
        $password = new Password('Password123!');
        $this->assertTrue(password_verify('Password123!', (string)$password));
    }

    public function testWeakPassword()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Password('weak');
    }
}