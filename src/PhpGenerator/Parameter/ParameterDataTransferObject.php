<?php

namespace ModuleGenerator\PhpGenerator\Parameter;

use ModuleGenerator\PhpGenerator\ParameterType\DBALType;

final class ParameterDataTransferObject
{
    /** @var string */
    public $name;

    /** @var DBALType */
    public $dbalType;

    /** @var bool */
    public $nullable;
}
