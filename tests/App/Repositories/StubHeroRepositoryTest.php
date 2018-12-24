<?php

use App\Repositories\StubHeroRepository;
use PHPUnit\Framework\TestCase;

class StubHeroRepositoryTest extends TestCase
{
    public function test_it_should_be_able_to_obtain_a_hero_from_storage_in_dummy_way()
    {
        $heroUuid = 'aaaa-bbbb-4ccc-dddd';
        $sut = new StubHeroRepository;

        $result = $sut->findByUuid($heroUuid);
        
        $this->assertEquals($heroUuid, $result->getUuid());
        $this->assertEquals(0, $result->getX());
        $this->assertEquals(0, $result->getY());
    }
}
