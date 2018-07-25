<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity;

class MyTestEntityDataTransferObject
{
    /**
     * @var MyTestEntity
     */
    private $myTestEntityEntity;

    public function __construct(MyTestEntity $myTestEntity = null)
    {
        $this->myTestEntityEntity = $myTestEntity;

        if (!$this->hasExistingMyTestEntity()) {
            return;
        }
    }

    public function getMyTestEntityEntity(): MyTestEntity
    {
        return $this->myTestEntityEntity;
    }

    public function hasExistingMyTestEntity(): bool
    {
        return $this->myTestEntityEntity instanceof MyTestEntity;
    }
}
