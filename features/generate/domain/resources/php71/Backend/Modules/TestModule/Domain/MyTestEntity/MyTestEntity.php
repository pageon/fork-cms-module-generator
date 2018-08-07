<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="MyTestEntity")
 * @ORM\Entity(repositoryClass="Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntityRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class MyTestEntity
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $createdOn;

    /**
     * @var DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $editedOn;

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @ORM\PrePersist
     */
    public function onPrePersist(): void
    {
        $this->createdOn = new DateTime();
        $this->editedOn = new DateTime();
    }

    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate(): void
    {
        $this->editedOn = new DateTime();
    }

    public function getCreatedOn(): DateTime
    {
        return $this->createdOn;
    }

    public function getEditedOn(): DateTime
    {
        return $this->editedOn;
    }

    public static function fromDataTransferObject(MyTestEntityDataTransferObject $dataTransferObject): self
    {
        if ($dataTransferObject->hasExistingMyTestEntity()) {
            return $dataTransferObject->getMyTestEntityEntity();
        }

        return new self();
    }
}
