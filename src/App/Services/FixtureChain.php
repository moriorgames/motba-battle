<?php

namespace App\Services;

interface FixtureChain
{
    public function execute($request): bool;
}
