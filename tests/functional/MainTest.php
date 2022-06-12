<?php

declare(strict_types=1);

use App\Core\Read\Model\User;
use App\Core\Read\Projector\Projector;
use App\Core\Read\Projector\UserCreatedProjection;
use App\Core\Write\Command\CreateUserCommand;
use App\Core\Write\Event\UserCreatedEvent;
use App\Core\Write\Aggregator\UserAggregate;
use PHPUnit\Framework\TestCase;
use App\Infrastructure\EventStore;
use App\Infrastructure\Repository\ReadRepository;
use App\Infrastructure\Repository\WriteRepository;

final class MainTest extends TestCase
{
    public function testBehaviour(): void{
        $eventStore = new EventStore();

        $readRepository = new ReadRepository();

        $writeRepository = new WriteRepository(
            $eventStore
        );

        $projector = new Projector(
            [
                new UserCreatedProjection($readRepository),
            ]
        );

        $userAggregate = new UserAggregate(
            $writeRepository,
            $projector
        );

        $createUserCommand = new CreateUserCommand(
            'Mark',
            'Smith'
        );

        $userAggregate->handleCreateUserCommand($createUserCommand);

        self::assertEquals(
            [
                new User(
                    'Mark',
                    'Smith'
                ),
            ],
            $readRepository->getAllUsers()
        );
    }
}
