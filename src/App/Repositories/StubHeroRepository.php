<?php

namespace App\Repositories;

use App\Entities\Hero;
use App\Enum\Archetype;

class StubHeroRepository implements HeroRepository
{
    public function findByUuid(string $uuid): Hero
    {
        return Hero::fromStorage($uuid, 'a', 1, 2, 3, Archetype::CARRY_MELEE(), 0, 0);
    }

    public function persist(Hero $hero): void
    {
        $hero->setX($hero->getX());
    }
}
