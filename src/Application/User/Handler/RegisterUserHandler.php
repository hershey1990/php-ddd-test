<?php

namespace Application\User\Handler;

use Application\User\Command\RegisterUserCommand;
use Domain\User\User;
use Domain\User\UserFactory;
use Domain\User\UserRepositoryInterface;

class RegisterUserHandler
{
    private $userRepository;
    private $userFactory;

    public function __construct(UserRepositoryInterface $userRepository, UserFactory $userFactory)
    {
        $this->userRepository = $userRepository;
        $this->userFactory = $userFactory;
    }

    public function handle(RegisterUserCommand $command): void
    {
        $user = $this->userFactory->create($command->getName(), $command->getEmail(), $command->getPassword());
        $this->userRepository->save($user);
    }
}