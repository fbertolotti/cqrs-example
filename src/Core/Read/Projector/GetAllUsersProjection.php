<?php

declare(strict_types=1);

namespace App\Core\Read\Projector;

use App\Core\Read\Model\User;
use App\Core\Read\Query\GetAllUsers;
use App\Core\Read\Repository\ReadRepositoryInterface;
use App\Core\Write\Event\EventInterface;
use App\Core\Write\Event\UserCreatedEvent;

class GetAllUsersProjection implements ProjectionInterface
{
    /** @var ReadRepositoryInterface */
    private $readRepository;

    public function __construct(
        ReadRepositoryInterface $readRepository
    ) {
        $this->readRepository = $readRepository;
    }

    public function listensTo(): string
    {
        return GetAllUsers::class;
    }

    public function project($object)
    {
        \assert($object instanceof UserCreatedEvent);

        return $this->readRepository->getAllUsers();
    }
}
