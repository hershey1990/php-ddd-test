<?php

namespace Presentation\User;

use Application\User\Command\RegisterUserRequest;
use Application\User\Handler\RegisterUserUseCase;

class RegisterUserController
{
    private RegisterUserUseCase $useCase;

    public function __construct(RegisterUserUseCase $useCase)
    {
        $this->useCase = $useCase;
    }

    public function handle(RegisterUserRequest $request): array
    {
        $this->useCase->handle($request);

        return ['status' => 'User registered successfully'];
    }
}