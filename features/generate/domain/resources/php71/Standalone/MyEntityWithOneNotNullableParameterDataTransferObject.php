<?php

namespace Standalone;

use Common\Locale;
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
        if ($this->hasExistingMyEntityWithOneNotNullableParameter()) {
            return $this->myEntityWithOneNotNullableParameterEntity->getId();
        }

        return null;
    }
}
