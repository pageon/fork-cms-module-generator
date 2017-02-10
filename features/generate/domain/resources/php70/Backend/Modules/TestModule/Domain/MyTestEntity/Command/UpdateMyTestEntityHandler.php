<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity\Command;

use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntity;

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
