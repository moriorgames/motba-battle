<?php

namespace App\Repositories;

use Predis\Client as RedisClient;

abstract class AbstractRedisRepository
{
    protected const NAMESPACE = 'abstract-';

    protected $client;

    public function __construct(RedisClient $client)
    {
        $this->client = $client;
    }

    protected function key(string $uuid): string
    {
        return static::NAMESPACE . $uuid;
    }
}
