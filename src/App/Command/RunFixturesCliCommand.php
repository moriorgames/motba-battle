<?php

namespace App\Command;

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
    }
}

