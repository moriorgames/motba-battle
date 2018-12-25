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
        $this->uuid = Uuid::uuid4()->toString();
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
        $hero->uuid = $uuid;
        $hero->setChildDomain();

        return $hero;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function getHitPoints(): int
    {
        return $this->hitPoints;
    }

    public function getArchetype(): Archetype
    {
        return $this->archetype;
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
