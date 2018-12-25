<?php

namespace App\Enum;

use MyCLabs\Enum\Enum;

class Archetype extends Enum
{
    public const CARRY_MELEE = 'CARRY_MELEE';
    public const CARRY_RANGED = 'CARRY_RANGED';
    public const CARRY_MAGIC = 'CARRY_MAGIC';
    public const HEALER = 'HEALER';
    public const BOOSTER = 'BOOSTER';
    public const TANK = 'TANK';
}
