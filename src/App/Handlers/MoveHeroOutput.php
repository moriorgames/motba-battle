<?php

namespace App\Handlers;

use App\Entities\Hero;

class MoveHeroOutput
{
    private $hero;

    public function __construct(Hero $hero)
    {
        $this->hero = $hero;
    }

    public function uuid(): string
    {
        return $this->hero->getUuid();
    }

    public function x(): int
    {
        return $this->hero->getX();
    }

    public function y(): int
    {
        return $this->hero->getY();
    }
}
