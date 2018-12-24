<?php

namespace App\Command;

use App\Handlers\MoveHeroInput;
use App\Handlers\MoveHeroHandler;
use App\Repositories\StubHeroRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MoveHeroCliCommand extends Command
{
    const COMMAND = 'app:move-hero';
    const ARGUMENT_HERO_UUID = 'hero_uuid';
    const ARGUMENT_X = 'x';
    const ARGUMENT_Y = 'y';

    protected function configure()
    {
        $this
            ->setName(self::COMMAND)
            ->setDescription('Given a contract resolve which side wins the trial.')
            ->addArgument(self::ARGUMENT_HERO_UUID, InputArgument::REQUIRED, 'Hero to be moved')
            ->addArgument(self::ARGUMENT_X, InputArgument::REQUIRED, 'Insert the "X" axis to be moved')
            ->addArgument(self::ARGUMENT_Y, InputArgument::REQUIRED, 'Insert the "Y" axis to be moved');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $heroRepository = new StubHeroRepository;
        $handler = new MoveHeroHandler($heroRepository);

        $command = new MoveHeroInput(
            $input->getArgument(self::ARGUMENT_HERO_UUID),
            $input->getArgument(self::ARGUMENT_X),
            $input->getArgument(self::ARGUMENT_Y)
        );

        while (true) {
            $result = $handler->handle($command);

            $format = 'Hero <info>%s</info> moved to X: <info>%d</info> Y: <info>%d</info>';
            $output->writeln(sprintf($format, $result->uuid(), $result->x(), $result->y()));
            sleep(1);
        }
    }
}
