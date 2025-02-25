<?php

namespace Domain\User;

interface UserRepositoryInterface
{
    public function save(User $user): void;
    public function findById(string $id): ?User;
    public function delete(string $id): void;
}