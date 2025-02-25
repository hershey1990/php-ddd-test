<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Domain\User\User;
use Infrastructure\Doctrine\User\DoctrineUserRepository;
use PHPUnit\Framework\TestCase;

class DoctrineUserRepositoryTest extends TestCase
{
    private EntityManager $entityManager;

    protected function setUp(): void
    {
        $config = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/../../../../src/Domain/User'], true, null, null, false);
        $conn = [
            'driver' => 'pdo_mysql',
            'user' => 'admin',
            'password' => 'root',
            'dbname' => 'PHP-DDD-APP',
        ];

        $this->entityManager = EntityManager::create($conn, $config);
    }

    public function testSaveAndFindById()
    {
        $repository = new DoctrineUserRepository($this->entityManager);

        $user = new User('1', 'John Doe', 'john@example.com', 'Password123!');
        $repository->save($user);

        $foundUser = $repository->findById('1');
        $this->assertEquals($user->getId(), $foundUser->getId());
    }

    public function testDelete()
    {
        $repository = new DoctrineUserRepository($this->entityManager);

        $user = new User('1', 'John Doe', 'john@example.com', 'Password123!');
        $repository->save($user);
        $repository->delete('1');

        $foundUser = $repository->findById('1');
        $this->assertNull($foundUser);
    }
}