<?php

namespace Standalone;

use Standalone\MyTestEntity;

final class UpdateMyTestEntityHandler
{
    public function handle(UpdateMyTestEntity $updateMyTestEntity): void
    {
        MyTestEntity::fromDataTransferObject($updateMyTestEntity);
    }
}
