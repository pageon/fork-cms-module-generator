#!/usr/bin/env php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use ModuleGenerator\CLI\Service\Update as UpdateService;
use ModuleGenerator\CLI\Command\Update;
use Symfony\Component\Console\Application;

// Create new application
$application = new Application();

// Services
$updateService = new UpdateService(__DIR__);

// Add update command
$application->add(new Update('update', $updateService));

// Run the application
$application->run();
