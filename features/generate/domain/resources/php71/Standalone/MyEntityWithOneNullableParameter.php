<?php

namespace Standalone;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="MyEntityWithOneNullableParameter")
 * @ORM\Entity(repositoryClass="Standalone\MyEntityWithOneNullableParameterRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class MyEntityWithOneNullableParameter
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
     * @var string|null
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $parameter1;

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

    public function __construct(
        ?string $parameter1
    ) {
        $this->parameter1 = $parameter1;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getParameter1(): ?string
    {
        return $this->parameter1;
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

    public static function fromDataTransferObject(MyEntityWithOneNullableParameterDataTransferObject $dataTransferObject): self
    {
        if ($dataTransferObject->hasExistingMyEntityWithOneNullableParameter()) {
            $myEntityWithOneNullableParameter = $dataTransferObject->getMyEntityWithOneNullableParameterEntity();
            $myEntityWithOneNullableParameter->parameter1 = $dataTransferObject->parameter1;

            return $myEntityWithOneNullableParameter;
        }

        return new self(
            $dataTransferObject->parameter1
        );
    }
}
