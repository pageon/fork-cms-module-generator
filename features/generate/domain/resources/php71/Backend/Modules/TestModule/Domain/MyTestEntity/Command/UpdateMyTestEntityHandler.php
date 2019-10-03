<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity\Command;

use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntity;

final class UpdateMyTestEntityHandler
{
    public function handle(UpdateMyTestEntity $updateMyTestEntity): void
    {
        MyTestEntity::fromDataTransferObject($updateMyTestEntity);
    }
}
