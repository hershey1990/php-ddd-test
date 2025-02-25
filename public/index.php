<?php

require_once __DIR__ . '/../src/bootstrap.php';

use Application\User\Command\RegisterUserRequest;
use Application\User\Handler\RegisterUserUseCase;
use Presentation\User\RegisterUserController;

// Obtener la ruta solicitada
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Enrutar la solicitud al controlador adecuado
if ($requestUri === '/register' && $requestMethod === 'POST') {
    $entityManager = require __DIR__ . '/../src/bootstrap.php';
    $userRepository = new Infrastructure\Doctrine\User\DoctrineUserRepository($entityManager);
    $useCase = new RegisterUserUseCase($userRepository);
    $controller = new RegisterUserController($useCase);

    // Obtener el cuerpo de la solicitud
    $requestBody = file_get_contents('php://input');
    $requestData = json_decode($requestBody, true);

    // Crear el comando y manejar la solicitud
    $command = new RegisterUserRequest(
        $requestData['name'],
        $requestData['email'],
        $requestData['password']
    );

    $response = $controller->handle($command);

    // Enviar la respuesta
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Responder con un error 404 si la ruta no coincide
    http_response_code(404);
    echo json_encode(['error' => 'Not Found']);
}