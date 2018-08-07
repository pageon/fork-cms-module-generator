<?php

namespace Standalone;

use Symfony\Component\Validator\Constraints as Assert;

class MyEntityWithOneNotNullableParameterDataTransferObject
{
    /**
     * @var MyEntityWithOneNotNullableParameter
     */
    private $myEntityWithOneNotNullableParameterEntity;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="err.FieldIsRequired")
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
