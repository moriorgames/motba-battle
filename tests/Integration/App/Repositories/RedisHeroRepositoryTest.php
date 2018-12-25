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
        $heroUuid = 'aaaaaaaa-bbbb-cccc-4ddd-eeeeeeeeeeee';
        $name = 'fake name';
        $speed = 1;
        $damage = 2;
        $hitPoints = 3;
        $archetype = Archetype::CARRY_MELEE();
        $x = 4;
        $y = 5;
        $fakeHero = Hero::fromStorage($heroUuid, $name, $speed, $damage, $hitPoints, $archetype, $x, $y);
        $sut = new RedisHeroRepository(new RedisClient);

        $result = $sut->persist($fakeHero);

        $this->assertTrue($result);

        $hero = $sut->findByUuid($heroUuid);

        $this->assertEquals($heroUuid, $hero->getUuid());
        $this->assertEquals($name, $hero->getName());
        $this->assertEquals($speed, $hero->getSpeed());
        $this->assertEquals($damage, $hero->getDamage());
        $this->assertEquals($hitPoints, $hero->getHitPoints());
        $this->assertEquals($archetype, $hero->getArchetype());
        $this->assertEquals($x, $hero->getX());
        $this->assertEquals($y, $hero->getY());
    }
}
