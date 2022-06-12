<?php

declare(strict_types=1);

namespace App\Core\Write\Aggregator;

use App\Core\Read\Projector\Projector;
use App\Core\Write\Command\CreateUserCommand;
use App\Core\Write\Event\UserCreatedEvent;
use App\Core\Write\Repository\WriteRepositoryInterface;

class UserAggregate
{
    /** @var WriteRepositoryInterface */
    private $writeRepository;

    /** @var Projector */
    private $projector;

    public function __construct(
        WriteRepositoryInterface $writeRepository,
        Projector $projector
    ) {
        $this->writeRepository = $writeRepository;
        $this->projector = $projector;
    }

    public function handleCreateUserCommand(CreateUserCommand $command): void
    {
        $event = new UserCreatedEvent(
            $command->getFirstname(),
            $command->getLastname()
        );

        $this->writeRepository->addEvent($event);

        $this->projector->project([$event]);
    }
}
