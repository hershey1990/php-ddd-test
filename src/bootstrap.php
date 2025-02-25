<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/Application/User/Command/RegisterUserCommand.php';
require_once __DIR__ . '/Application/User/Handler/RegisterUserHandler.php';
require_once __DIR__ . '/Domain/User/User.php';
require_once __DIR__ . '/Domain/User/UserRepository.php';
require_once __DIR__ . '/Domain/User/UserFactory.php';
require_once __DIR__ . '/Infrastructure/Doctrine/User/UserDoctrineRepository.php';
require_once __DIR__ . '/Infrastructure/Doctrine/User/UserMapping.php';
require_once __DIR__ . '/Infrastructure/Persistence/Doctrine/EntityManagerFactory.php';
require_once __DIR__ . '/Presentation/User/RegisterUserController.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/Domain'], $isDevMode);

// Configuración de la conexión a la base de datos
$conn = [
    'driver' => 'pdo_mysql',
    'user' => 'admin',
    'password' => 'root',
    'dbname' => 'PHP-DDD-APP',
];

$entityManager = EntityManager::create($conn, $config);

return $entityManager;