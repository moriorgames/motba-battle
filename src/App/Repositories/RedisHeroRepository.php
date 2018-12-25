<?php

namespace App\Repositories;

use App\Entities\Hero;
use App\Enum\Archetype;
use App\Services\TokenValidator;

class RedisHeroRepository extends AbstractRedisRepository implements HeroRepository
{
    protected const NAMESPACE = 'hero-';

    public function persist(Hero $hero): bool
    {
        if (TokenValidator::validate($hero->getUuid())) {
            $this->persistHero($hero);

            return true;
        }

        return false;
    }

    public function findByUuid(string $uuid): Hero
    {
        $data = $this->get($uuid);

        return Hero::fromStorage(
            $data['uuid'],
            $data['name'],
            $data['speed'],
            $data['damage'],
            $data['hitPoints'],
            new Archetype($data['archetype']),
            $data['x'],
            $data['y']
        );
    }

    private function get(string $uuid): array
    {
        $key = $this->key($uuid);

        return json_decode($this->client->get($key), true) ?? [];
    }

    private function persistHero(Hero $hero)
    {
        $key = $this->key($hero->getUuid());
        $this->client->set($key, $this->heroToJson($hero));
    }

    private function heroToJson(Hero $hero): string
    {
        $array = [
            'uuid'      => $hero->getUuid(),
            'name'      => $hero->getName(),
            'speed'     => $hero->getSpeed(),
            'damage'    => $hero->getDamage(),
            'hitPoints' => $hero->getHitPoints(),
            'archetype' => $hero->getArchetype(),
            'x'         => $hero->getX(),
            'y'         => $hero->getY(),
        ];

        return json_encode($array);
    }
}
