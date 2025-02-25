<?php

use Application\User\Command\RegisterUserRequest;
use Application\User\Handler\RegisterUserUseCase;
use Domain\User\UserRepositoryInterface;
use PHPUnit\Framework\TestCase;

class RegisterUserUseCaseTest extends TestCase
{
    public function testHandle()
    {
        $userRepository = $this->createMock(UserRepositoryInterface::class);
        $userRepository->expects($this->once())->method('save');

        $useCase = new RegisterUserUseCase($userRepository);
        $request = new RegisterUserRequest('John Doe', 'john@example.com', 'Password123!');

        $useCase->handle($request);
    }

    public function testHandleUserAlreadyExists()
    {
        $this->expectException(\Exception::class);

        $userRepository = $this->createMock(UserRepositoryInterface::class);
        $userRepository->method('findById')->willReturn(new User('1', 'John Doe', 'john@example.com', 'Password123!'));

        $useCase = new RegisterUserUseCase($userRepository);
        $request = new RegisterUserRequest('John Doe', 'john@example.com', 'Password123!');

        $useCase->handle($request);
    }
}