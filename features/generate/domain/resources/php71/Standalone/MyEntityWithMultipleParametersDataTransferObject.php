<?php

namespace Standalone;

class MyEntityWithMultipleParametersDataTransferObject
{
    /**
     * @var MyEntityWithMultipleParameters
     */
    private $myEntityWithMultipleParametersEntity;

    /**
     * @var string
     */
    public $parameter1;

    /**
     * @var string
     */
    public $parameter2;

    public function __construct(MyEntityWithMultipleParameters $myEntityWithMultipleParameters = null)
    {
        $this->myEntityWithMultipleParametersEntity = $myEntityWithMultipleParameters;

        if (!$this->hasExistingMyEntityWithMultipleParameters()) {
            return;
        }

        $this->parameter1 = $this->myEntityWithMultipleParametersEntity->getParameter1();
        $this->parameter2 = $this->myEntityWithMultipleParametersEntity->getParameter2();
    }

    public function getMyEntityWithMultipleParametersEntity(): MyEntityWithMultipleParameters
    {
        return $this->myEntityWithMultipleParametersEntity;
    }

    public function hasExistingMyEntityWithMultipleParameters(): bool
    {
        return $this->myEntityWithMultipleParametersEntity instanceof MyEntityWithMultipleParameters;
    }
}
