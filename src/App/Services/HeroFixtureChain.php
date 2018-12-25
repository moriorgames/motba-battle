<?php

namespace App\Services;

class HeroFixtureChain implements FixtureChain
{
    public function execute($request): bool
    {
        return true;
    }
}
