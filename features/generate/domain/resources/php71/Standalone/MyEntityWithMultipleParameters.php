<?php

namespace Standalone;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="MyEntityWithMultipleParameters")
 * @ORM\Entity(repositoryClass="Standalone\MyEntityWithMultipleParametersRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class MyEntityWithMultipleParameters
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
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $parameter1;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $parameter2;

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
        string $parameter1,
        string $parameter2
    ) {
        $this->parameter1 = $parameter1;
        $this->parameter2 = $parameter2;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getParameter1(): string
    {
        return $this->parameter1;
    }

    public function getParameter2(): string
    {
        return $this->parameter2;
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

    public static function fromDataTransferObject(MyEntityWithMultipleParametersDataTransferObject $dataTransferObject): self
    {
        if ($dataTransferObject->hasExistingMyEntityWithMultipleParameters()) {
            $myEntityWithMultipleParameters = $dataTransferObject->getMyEntityWithMultipleParametersEntity();
            $myEntityWithMultipleParameters->parameter1 = $dataTransferObject->parameter1;
            $myEntityWithMultipleParameters->parameter2 = $dataTransferObject->parameter2;

            return $myEntityWithMultipleParameters;
        }

        return new self(
            $dataTransferObject->parameter1,
            $dataTransferObject->parameter2
        );
    }
}
