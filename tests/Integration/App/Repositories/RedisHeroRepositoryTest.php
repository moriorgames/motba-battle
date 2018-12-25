<?php

use App\Entities\Hero;
use App\Enum\Archetype;
use Predis\Client as RedisClient;
use App\Repositories\RedisHeroRepository;
use PHPUnit\Framework\TestCase;

class RedisHeroRepositoryTest extends TestCase
{
    public function test_it_should_be_able_to_persist_hero_onto_redis()
    {
        $hero = new Hero('a', 1, 2, 3, Archetype::CARRY_MELEE(), 0, 0);
        $sut = new RedisHeroRepository(new RedisClient);

        $result = $sut->persist($hero);

        $this->assertTrue($result);
    }
}
