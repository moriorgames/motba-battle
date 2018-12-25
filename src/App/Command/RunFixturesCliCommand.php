<?php

namespace App\Command;

use App\Handlers\MoveHeroInput;
use App\Handlers\MoveHeroHandler;
use App\Repositories\StubHeroRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RunFixturesCliCommand extends Command
{
    const COMMAND = 'app:run-fixtures';

    protected function configure()
    {
        $this
            ->setName(self::COMMAND)
            ->setDescription('Run the fixtures to prepare development environment with dummy data.');
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

