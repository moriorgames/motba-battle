<?php

use App\Entities\Hero;
use App\Entities\HeroBase;
use PHPUnit\Framework\TestCase;

class HeroTest extends TestCase
{
    public function test_it_should_be_able_to_setup_abstract_domain()
    {
        $sut = new Hero(0, 0);
        $sut->setAbstractDomain();

        $this->assertEquals(HeroBase::DOMAIN, $sut->getDomain());
    }

    public function test_it_should_be_able_to_setup_child_domain()
    {
        $sut = new Hero(0, 0);
        $sut->setChildDomain();

        $this->assertEquals(Hero::DOMAIN, $sut->getDomain());
    }
}
