#!/usr/bin/env php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use ModuleGenerator\AppKernel;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Debug\Debug;

Debug::enable();

$kernel = new AppKernel('prod', false);
$application = new Application($kernel);
$application->run();
