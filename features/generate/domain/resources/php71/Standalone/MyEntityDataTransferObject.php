<?php

namespace Standalone;

class MyEntityDataTransferObject
{
    /**
     * @var MyEntity
     */
    private $myEntityEntity;

    public function __construct(MyEntity $myEntity = null)
    {
        $this->myEntityEntity = $myEntity;

        if (!$this->hasExistingMyEntity()) {
            return;
        }
    }

    public function getMyEntityEntity(): MyEntity
    {
        return $this->myEntityEntity;
    }

    public function hasExistingMyEntity(): bool
    {
        return $this->myEntityEntity instanceof MyEntity;
    }
}
