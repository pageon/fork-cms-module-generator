<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity\Command;

use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntityDataTransferObject;

final class CreateMyTestEntity extends MyTestEntityDataTransferObject
{
    public function __construct()
    {
        // make it impossible to add an existing CreateMyTestEntity via the constructor
        parent::__construct();
    }
}
