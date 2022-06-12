<?php

declare(strict_types=1);

namespace App\Core\Read\Projector;

use App\Core\Write\Event\EventInterface;

class Projector
{
    /**
     * @var ProjectionInterface[]
     */
    private $projections = [];

    /**
     * @param ProjectionInterface[] $projections
     */
    public function __construct(array $projections)
    {
        foreach ($projections as $projection) {
            $this->projections[$projection->listensTo()] = $projection;
        }
    }

    /**
     * @phpstan-param EventInterface[] $events
     */
    public function project(array $events): void
    {
        foreach ($events as $event) {
            if (isset($this->projections[get_class($event)])) {
                $this->projections[get_class($event)]->project($event);
            }
        }
    }
}
