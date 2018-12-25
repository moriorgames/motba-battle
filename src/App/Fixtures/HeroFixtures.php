<?php

namespace App\Fixtures;

use App\Enum\Archetype;

class HeroFixtures
{
    public const DATA = [
        [
            'name'      => 'Morior',
            'speed'     => 1,
            'damage'    => 2,
            'hitPoints' => 5,
            'archetype' => Archetype::CARRY_MELEE,
            'x'         => 0,
            'y'         => 0,
        ],
    ];
}
