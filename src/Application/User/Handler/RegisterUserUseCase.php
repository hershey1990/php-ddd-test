<?php

namespace Application\User\Handler;

use Application\User\Command\RegisterUserRequest;
use Domain\User\User;
use Domain\User\UserRepositoryInterface;
use Domain\User\Event\UserRegisteredEvent;
use DateTimeImmutable;

class RegisterUserUseCase
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(RegisterUserRequest $request): void
    {
        // Verificar si el email ya está en uso
        if ($this->userRepository->findById($request->email)) {
            throw new \Exception('User with this email already exists.');
        }

        // Crear una nueva instancia de User
        $user = new User(
            uniqid(),
            $request->name,
            $request->email,
            $request->password
        );

        // Guardar el usuario en la base de datos
        $this->userRepository->save($user);

        // Disparar el evento UserRegisteredEvent
        $event = new UserRegisteredEvent($user);
        // Aquí puedes manejar el evento, por ejemplo, enviando un correo electrónico de bienvenida.
    }
}