<?php

namespace App\Repositories;

use App\Entities\Hero;

interface HeroRepository
{
    public function findByUuid(string $uuid): Hero;

    public function persist(Hero $hero): bool;
}
