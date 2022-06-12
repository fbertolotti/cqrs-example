<?php

declare(strict_types=1);

namespace App\Core\Read\Projector;

use App\Core\Read\Model\User;
use App\Core\Read\Repository\ReadRepositoryInterface;
use App\Core\Write\Event\EventInterface;
use App\Core\Write\Event\UserCreatedEvent;

class UserCreatedProjection implements ProjectionInterface
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
        return UserCreatedEvent::class;
    }

    public function project($object)
    {
        \assert($object instanceof UserCreatedEvent);

        $user = new User(
            $object->getFirstname(),
            $object->getLastname()
        );

        $this->readRepository->createUser(
            $user
        );
    }
}
