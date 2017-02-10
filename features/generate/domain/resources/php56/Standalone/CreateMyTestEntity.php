<?php

namespace Standalone;

use Standalone\MyTestEntityDataTransferObject;

final class CreateMyTestEntity extends MyTestEntityDataTransferObject
{
    public function __construct()
    {
        // make it impossible to add an existing CreateMyTestEntity via the constructor
        parent::__construct();
    }
}
