<?php

namespace App\Handlers;

use App\Repositories\HeroRepository;

class MoveHeroHandler
{
    private $heroRepository;

    public function __construct(HeroRepository $heroRepository)
    {
        $this->heroRepository = $heroRepository;
    }

    public function handle(MoveHeroInput $command): MoveHeroOutput
    {
        $hero = $this->heroRepository->findByUuid($command->getHeroUuid());
        $hero->setX($command->getX());
        $hero->setY($command->getY());
        $this->heroRepository->persist($hero);

        return new MoveHeroOutput($hero);
    }
}
