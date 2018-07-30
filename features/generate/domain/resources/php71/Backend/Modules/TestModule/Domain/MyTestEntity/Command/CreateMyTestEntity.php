<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity\Command;

use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntityDataTransferObject;
use Common\Locale;

final class CreateMyTestEntity extends MyTestEntityDataTransferObject
{
    public function __construct(Locale $locale)
    {
        parent::__construct();

        $this->locale = $locale;
    }
}
