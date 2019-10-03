<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity;

use Common\Locale;

class MyTestEntityDataTransferObject
{
    /**
     * @var MyTestEntity
     */
    private $myTestEntityEntity;

    public function __construct(MyTestEntity $myTestEntity = null)
    {
        $this->myTestEntityEntity = $myTestEntity;

        if (!$this->hasExistingMyTestEntity()) {
            return;
        }
    }

    public function getMyTestEntityEntity(): MyTestEntity
    {
        return $this->myTestEntityEntity;
    }

    public function hasExistingMyTestEntity(): bool
    {
        return $this->myTestEntityEntity instanceof MyTestEntity;
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
        if ($this->hasExistingMyTestEntity()) {
            return $this->myTestEntityEntity->getId();
        }

        return null;
    }
}
