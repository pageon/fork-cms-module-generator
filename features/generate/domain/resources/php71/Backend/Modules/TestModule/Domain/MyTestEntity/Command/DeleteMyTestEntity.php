<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity\Command;

use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntity;

final class DeleteMyTestEntity
{
    /** @var MyTestEntity */
    private $myTestEntity;

    public function __construct(MyTestEntity $myTestEntity)
    {
        $this->myTestEntity = $myTestEntity;
    }

    public function getMyTestEntity(): MyTestEntity
    {
        return $this->myTestEntity;
    }
}
