<?php

namespace App\Infrastructure\Doctrine\User;

use App\Domain\User\User;
use App\Domain\User\UserRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class UserDoctrineRepository implements UserRepositoryInterface
{
    private EntityRepository $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(User::class);
    }

    public function save(User $user): void
    {
        $entityManager = $this->repository->getEntityManager();
        $entityManager->persist($user);
        $entityManager->flush();
    }

    public function findById($id): ?User
    {
        return $this->repository->find($id);
    }

    public function delete($id): void
    {
        $user = $this->findById($id);
        if ($user) {
            $entityManager = $this->repository->getEntityManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }
    }
}