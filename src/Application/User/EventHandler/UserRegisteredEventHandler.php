<?php

namespace Application\User\EventHandler;

use Domain\User\Event\UserRegisteredEvent;

class UserRegisteredEventHandler
{
    public function handle(UserRegisteredEvent $event): void
    {
        $user = $event->getUser();
        // Aquí puedes implementar la lógica para enviar un email de bienvenida o cualquier otra acción.
        // Por ejemplo:
        // $this->emailService->sendWelcomeEmail($user->getEmail());
    }
}