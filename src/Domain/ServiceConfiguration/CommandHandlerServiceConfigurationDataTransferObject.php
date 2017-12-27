<?php

namespace ModuleGenerator\Domain\ServiceConfiguration;

use ModuleGenerator\CLI\Service\Generate\GeneratableClass;

final class CommandHandlerServiceConfigurationDataTransferObject
{
    /** @var GeneratableClass */
    public $commandHandler;

    /** @var array */
    public $arguments;

    /** @var array */
    public $tags;
}
