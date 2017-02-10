<?php

namespace Standalone;

use Standalone\MyTestEntity;

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
