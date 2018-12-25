<?php

namespace App\Repositories;

use Predis\Client as RedisClient;

abstract class AbstractRedisRepository
{
    protected $client;

    public function __construct(RedisClient $client)
    {
        $this->client = $client;
    }
}
