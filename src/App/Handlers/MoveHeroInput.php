<?php

namespace App\Handlers;

class MoveHeroInput
{
    private $heroUuid;
    private $x;
    private $y;

    public function __construct(string $heroUuid, int $x, int $y)
    {
        $this->heroUuid = $heroUuid;
        $this->x = $x;
        $this->y = $y;
    }

    public function getHeroUuid(): string
    {
        return $this->heroUuid;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }
}
