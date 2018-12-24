<?php

namespace App\Repositories;

use App\Entities\Hero;

class StubHeroRepository implements HeroRepository
{
    public function findByUuid(string $uuid): Hero
    {
        return Hero::fromStorage($uuid, 0, 0);
    }

    public function persist(Hero $hero): void
    {
        $hero->setX($hero->getX());
    }
}
