<?php

use App\Services\HeroFixtureChain;
use PHPUnit\Framework\TestCase;

class HeroFixtureChainTest extends TestCase
{
    public function test_it_should_be_able_to_execute_the_fixture()
    {
        $request = null;
        $sut = new HeroFixtureChain;

        $result = $sut->execute($request);

        $this->assertTrue($result);
    }
}
