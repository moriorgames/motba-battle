<?php

namespace App\Entities;

use App\Enum\Archetype;
use Ramsey\Uuid\Uuid;

class Hero extends HeroBase
{
    public const DOMAIN = 'model';

    private $uuid;
    private $name;
    private $speed;
    private $damage;
    private $hitPoints;
    private $archetype;
    private $x;
    private $y;

    public function __construct(
        string $name, int $speed, int $damage, int $hitPoints, Archetype $archetype, int $x, int $y
    )
    {
        $this->name = $name;
        $this->speed = $speed;
        $this->damage = $damage;
        $this->hitPoints = $hitPoints;
        $this->archetype = $archetype;
        $this->x = $x;
        $this->y = $y;
    }

    public static function fromStorage(
        string $uuid, string $name, int $speed, int $damage, int $hitPoints, Archetype $archetype, int $x, int $y
    ): self
    {
        $hero = new static($name, $speed, $damage, $hitPoints, $archetype, $x, $y);
        $hero->setUuid($uuid);
        $hero->setChildDomain();

        return $hero;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    private function setUuid(string $uuid)
    {
        $this->uuid = $uuid;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function setX(int $x)
    {
        $this->x = $x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function setY(int $y)
    {
        $this->y = $y;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }
}
