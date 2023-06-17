<?php

namespace Gama\GamaPhp\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GreetCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('greet')
            ->setDescription('Greet the user')
            ->setHelp('This command displays a greeting message to the user');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Hello, world!');
    }
}
