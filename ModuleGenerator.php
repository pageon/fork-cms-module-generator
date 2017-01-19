#!/usr/bin/env php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;

// Create new application
$application = new Application();

// Add commands
$application->addCommands(
    [
        new \ModuleGenerator\CLI\Command\ModuleGenerator\Update(
            new \ModuleGenerator\CLI\Service\ModuleGenerator\Update(__DIR__)
        ),
    ]
);

// Run the application
$application->run();
