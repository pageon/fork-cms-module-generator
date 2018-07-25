<?php

namespace Standalone;

class MyEntityWithOneNotNullableParameterDataTransferObject
{
    /**
     * @var MyEntityWithOneNotNullableParameter
     */
    private $myEntityWithOneNotNullableParameterEntity;

    /**
     * @var string
     */
    public $parameter1;

    public function __construct(MyEntityWithOneNotNullableParameter $myEntityWithOneNotNullableParameter = null)
    {
        $this->myEntityWithOneNotNullableParameterEntity = $myEntityWithOneNotNullableParameter;

        if (!$this->hasExistingMyEntityWithOneNotNullableParameter()) {
            return;
        }

        $this->parameter1 = $this->myEntityWithOneNotNullableParameterEntity->getParameter1();
    }

    public function getMyEntityWithOneNotNullableParameterEntity(): MyEntityWithOneNotNullableParameter
    {
        return $this->myEntityWithOneNotNullableParameterEntity;
    }

    public function hasExistingMyEntityWithOneNotNullableParameter(): bool
    {
        return $this->myEntityWithOneNotNullableParameterEntity instanceof MyEntityWithOneNotNullableParameter;
    }
}
