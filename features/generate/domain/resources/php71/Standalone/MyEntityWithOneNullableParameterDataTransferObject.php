<?php

namespace Standalone;

use Common\Locale;

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

    /**
     * @TODO remove when entity doesn't use meta
     */
    public function getLocale(): Locale
    {
        return $this->locale;
    }

    /**
     * @TODO remove when entity doesn't use meta
     */
    public function getId(): ?int
    {
        if ($this->hasExistingMyEntityWithOneNullableParameter()) {
            return $this->myEntityWithOneNullableParameterEntity->getId();
        }

        return null;
    }
}
