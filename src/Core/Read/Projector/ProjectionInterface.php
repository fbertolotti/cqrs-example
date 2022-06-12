<?php

declare(strict_types=1);

namespace App\Core\Read\Projector;

use App\Core\Read\Query\QueryInterface;
use App\Core\Write\Event\EventInterface;

interface ProjectionInterface
{
    function listensTo(): string;

    /**
     * @param EventInterface|QueryInterface $object
     */
    function project($object);
}
