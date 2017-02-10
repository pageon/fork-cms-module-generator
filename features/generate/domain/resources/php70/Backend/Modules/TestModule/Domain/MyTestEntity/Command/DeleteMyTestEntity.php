<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity\Command;

use Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntity;

final class DeleteMyTestEntity
{
    /** @var MyTestEntity */
    private $myTestEntity;

    /**
     * @param MyTestEntity $myTestEntity
     */
    public function __construct(MyTestEntity $myTestEntity)
    {
        $this->myTestEntity = $myTestEntity;
    }

    /**
     * @return MyTestEntity
     */
    public function getMyTestEntity(): MyTestEntity
    {
        return $this->myTestEntity;
    }
}
