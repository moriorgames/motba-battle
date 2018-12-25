<?php

namespace App\Repositories;

use App\Entities\Hero;

class RedisHeroRepository extends AbstractRedisRepository implements HeroRepository
{
    public function persist(Hero $hero): bool
    {
        return true;
    }

    public function findByUuid(string $uuid): Hero
    {
        return Hero::fromStorage($uuid, 'a', 1, 2, 3, Archetype::CARRY_MELEE(), 0, 0);
    }
}
