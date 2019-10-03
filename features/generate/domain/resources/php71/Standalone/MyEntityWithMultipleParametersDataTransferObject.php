<?php

namespace Standalone;

use Common\Locale;
use Symfony\Component\Validator\Constraints as Assert;

class MyEntityWithMultipleParametersDataTransferObject
{
    /**
     * @var MyEntityWithMultipleParameters
     */
    private $myEntityWithMultipleParametersEntity;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="err.FieldIsRequired")
     */
    public $parameter1;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="err.FieldIsRequired")
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
        if ($this->hasExistingMyEntityWithMultipleParameters()) {
            return $this->myEntityWithMultipleParametersEntity->getId();
        }

        return null;
    }
}
