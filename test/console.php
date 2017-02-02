<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Kernel;
use App\Application;
use Symfony\Component\Debug\Debug;

Debug::enable();

$kernel = new Kernel('test', true, __DIR__ . '/../vendor');
$application = new Application($kernel);
$application->run();
