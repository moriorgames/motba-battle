<?php

namespace App\Entities;

use Ramsey\Uuid\Uuid;

class HeroMove extends HeroTransactionBase
{
    public const DOMAIN = 'model';

    private $uuid;
    private $x;
    private $y;

    public function __construct(int $x, int $y)
    {
        $this->uuid = Uuid::uuid4()->toString();
        $this->x = $x;
        $this->y = $y;
    }

    public static function fromStorage(string $uuid, int $x, int $y): self
    {
        $hero = new static($x, $y);
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
