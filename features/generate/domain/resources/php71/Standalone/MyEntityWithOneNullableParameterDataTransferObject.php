<?php

namespace Standalone;

class MyEntityWithOneNullableParameterDataTransferObject
{
    /**
     * @var MyEntityWithOneNullableParameter
     */
    private $myEntityWithOneNullableParameterEntity;

    /**
     * @var string|null
     */
    public $parameter1;

    public function __construct(MyEntityWithOneNullableParameter $myEntityWithOneNullableParameter = null)
    {
        $this->myEntityWithOneNullableParameterEntity = $myEntityWithOneNullableParameter;

        if (!$this->hasExistingMyEntityWithOneNullableParameter()) {
            return;
        }

        $this->parameter1 = $this->myEntityWithOneNullableParameterEntity->getParameter1();
    }

    public function getMyEntityWithOneNullableParameterEntity(): MyEntityWithOneNullableParameter
    {
        return $this->myEntityWithOneNullableParameterEntity;
    }

    public function hasExistingMyEntityWithOneNullableParameter(): bool
    {
        return $this->myEntityWithOneNullableParameterEntity instanceof MyEntityWithOneNullableParameter;
    }
}
