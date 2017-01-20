#!/usr/bin/env php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use ModuleGenerator\AppKernel;
use ModuleGenerator\Application;
use Symfony\Component\Debug\Debug;

Debug::enable();

$kernel = new AppKernel('dev', true);
$application = new Application($kernel);
$application->run();
