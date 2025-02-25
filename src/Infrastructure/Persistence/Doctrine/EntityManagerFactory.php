<?php

namespace Infrastructure\Persistence\Doctrine;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    private static ?EntityManagerInterface $entityManager = null;

    public static function createEntityManager(array $dbParams): EntityManagerInterface
    {
        if (self::$entityManager === null) {
            $config = Setup::createAnnotationMetadataConfiguration(
                [__DIR__ . '/../../User'], // Path to your entities
                true // Is dev mode
            );

            self::$entityManager = EntityManager::create($dbParams, $config);
        }

        return self::$entityManager;
    }
}