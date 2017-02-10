<?php

namespace Standalone;

use Standalone\MyTestEntity;

final class UpdateMyTestEntityHandler
{
    /**
     * @param UpdateMyTestEntity $updateMyTestEntity
     */
    public function handle(UpdateMyTestEntity $updateMyTestEntity)
    {
        MyTestEntity::fromDataTransferObject($updateMyTestEntity);
    }
}
