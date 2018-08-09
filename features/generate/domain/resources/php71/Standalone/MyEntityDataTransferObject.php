<?php

namespace Standalone;

use Common\Locale;

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
        if ($this->hasExistingMyEntity()) {
            return $this->myEntityEntity->getId();
        }

        return null;
    }
}
