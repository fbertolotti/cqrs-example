<?php

declare(strict_types=1);

namespace App\Core\Write\Repository;

use App\Core\Write\Event\EventInterface;

interface WriteRepositoryInterface
{
    function addEvent(EventInterface $event): void;
}
