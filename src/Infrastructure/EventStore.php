<?php

declare(strict_types=1);

namespace App\Infrastructure;

use App\Core\Write\Event\EventInterface;

class EventStore
{
    /** @var EventInterface[] */
    private $events = [];

    public function addEvent(EventInterface $event): void
    {
        $this->events[] = $event;
    }

    /**
     * @return array
     * @phpstan-return EventInterface[]
     */
    public function getEvents(): array
    {
        return $this->events;
    }
}
