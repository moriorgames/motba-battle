<?php

namespace App\Entities;

abstract class HeroBase
{
    public const DOMAIN = 'abstract';
    protected $domain;

    public function setAbstractDomain()
    {
        $this->domain = self::DOMAIN;
    }

    public function setChildDomain()
    {
        $this->domain = static::DOMAIN;
    }
}
