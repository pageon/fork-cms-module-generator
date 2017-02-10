<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity\Command;

use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntityDataTransferObject;
use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntity;

final class UpdateMyTestEntity extends MyTestEntityDataTransferObject
{
    /**
     * @param MyTestEntity $myTestEntity
     */
    public function __construct(MyTestEntity $myTestEntity)
    {
        // make sure we have an existing myTestEntity
        parent::__construct($myTestEntity);
    }
}
