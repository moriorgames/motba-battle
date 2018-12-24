<?php

use App\Entities\Hero;
use App\Handlers\MoveHeroInput;
use App\Handlers\MoveHeroHandler;
use App\Repositories\HeroRepository;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;
use Prophecy\Prophecy\ObjectProphecy;

class MoveHeroHandlerTest extends TestCase
{
    /** @var string */
    private $heroUuid = 'aaaa-bbbb-4ccc-dddd';
    /** @var ObjectProphecy|HeroRepository */
    private $heroRepository;
    /** @var MoveHeroHandler */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->heroRepository = $this->prophesize(HeroRepository::class);
        $this->sut = new MoveHeroHandler($this->heroRepository->reveal());
    }

    public function test_it_should_be_able_to_move_hero_when_command_enters_and_persist_on_storage()
    {
        $hero = Hero::fromStorage($this->heroUuid, 0, 0);
        $this->heroRepository->findByUuid(Argument::exact($this->heroUuid))->willReturn($hero);
        $this->heroRepository->persist(Argument::type(Hero::class));
        $x = 2;
        $y = 3;
        $command = new MoveHeroInput($this->heroUuid, $x, $y);

        $result = $this->sut->handle($command);

        $this->assertEquals($this->heroUuid, $result->uuid());
        $this->assertEquals($x, $result->x());
        $this->assertEquals($y, $result->y());
    }
}
