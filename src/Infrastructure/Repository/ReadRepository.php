<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Core\Read\Model\User;
use App\Core\Read\Repository\ReadRepositoryInterface;

class ReadRepository implements ReadRepositoryInterface
{
    /**
     * @var array
     * @phpstan-var User[]
     */
    private $users;

    public function createUser(User $user): void
    {
        $this->users[] = $user;
    }

    public function getAllUsers(): array
    {
        return $this->users;
    }
}
