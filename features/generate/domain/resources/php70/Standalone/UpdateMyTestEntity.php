<?php

namespace Standalone;

use Standalone\MyTestEntityDataTransferObject;
use Standalone\MyTestEntity;

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
