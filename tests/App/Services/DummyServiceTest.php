<?php

use App\Services\DummyService;
use PHPUnit\Framework\TestCase;

class DummyServiceTest extends TestCase
{
    public function test_dummy_is_true()
    {
        $sut = new DummyService;

        $result = $sut->getTrue();

        $this->assertTrue($result);
    }
}
