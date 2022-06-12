<?php

declare(strict_types=1);

namespace App\Core\Read\Repository;

use App\Core\Read\Model\User;

interface ReadRepositoryInterface
{
    function createUser(User $user): void;

    /**
     * @return array
     * @phpstan-return User[]
     */
    function getAllUsers(): array;
}
