<?php

require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Gama\GamaPhp\Commands\GreetCommand;
use Gama\GamaPhp\Commands\MakeRouteCommand;

$application = new Application();

// Register your commands here
$application->add(new GreetCommand());
$application->add(new MakeRouteCommand());

$application->run();
