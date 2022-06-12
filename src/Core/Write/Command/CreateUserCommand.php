<?php

declare(strict_types=1);

namespace App\Core\Write\Command;

class CreateUserCommand implements CommandInterface
{
    /** @var string */
    private $firstname;

    /** @var string */
    private $lastname;

    public function __construct(
        string $firstname,
        string $lastname
    ) {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }
}
