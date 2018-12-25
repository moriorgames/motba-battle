<?php

use App\Entities\Hero;
use App\Entities\HeroBase;
use App\Enum\Archetype;
use PHPUnit\Framework\TestCase;

class HeroTest extends TestCase
{
    /** @var Hero */
    private $sut;

    public function setUp()
    {
        parent::setUp();
        $this->sut = new Hero('a', 1, 2, 3, Archetype::CARRY_MELEE(), 0, 0);
    }

    public function test_it_should_be_able_to_setup_abstract_domain()
    {
        $this->sut->setAbstractDomain();

        $this->assertEquals(HeroBase::DOMAIN, $this->sut->getDomain());
    }

    public function test_it_should_be_able_to_setup_child_domain()
    {
        $this->sut->setChildDomain();

        $this->assertEquals(Hero::DOMAIN, $this->sut->getDomain());
    }
}
