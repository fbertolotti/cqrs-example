<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Core\Write\Event\EventInterface;
use App\Core\Write\Repository\WriteRepositoryInterface;
use App\Infrastructure\EventStore;

class WriteRepository implements WriteRepositoryInterface
{
    /** @var EventStore */
    private $eventStore;

    public function __construct(
        EventStore $eventStore
    ) {
        $this->eventStore = $eventStore;
    }

    public function addEvent(EventInterface $event): void
    {
        $this->eventStore->addEvent($event);
    }
}
