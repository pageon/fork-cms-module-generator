<?php

namespace Standalone;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="FormEntityTable")
 * @ORM\Entity(repositoryClass="Standalone\FormEntityRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class FormEntity
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
    private $string;

    /**
     * @var bool
     *
     * @ORM\Column(type="boolean")
     */
    private $boolean;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="time")
     */
    private $time;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $datetime;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $integer;

    /**
     * @var float
     *
     * @ORM\Column(type="float")
     */
    private $float;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $text;

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
        string $string,
        bool $boolean,
        \DateTime $time,
        \DateTime $date,
        \DateTime $datetime,
        int $integer,
        float $float,
        string $text
    ) {
        $this->string = $string;
        $this->boolean = $boolean;
        $this->time = $time;
        $this->date = $date;
        $this->datetime = $datetime;
        $this->integer = $integer;
        $this->float = $float;
        $this->text = $text;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getString(): string
    {
        return $this->string;
    }

    public function isBoolean(): bool
    {
        return $this->boolean;
    }

    public function getTime(): \DateTime
    {
        return $this->time;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function getDatetime(): \DateTime
    {
        return $this->datetime;
    }

    public function getInteger(): int
    {
        return $this->integer;
    }

    public function getFloat(): float
    {
        return $this->float;
    }

    public function getText(): string
    {
        return $this->text;
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

    public static function fromDataTransferObject(FormEntityDataTransferObject $dataTransferObject): self
    {
        if ($dataTransferObject->hasExistingFormEntity()) {
            $formEntity = $dataTransferObject->getFormEntityEntity();
            $formEntity->string = $dataTransferObject->string;
            $formEntity->boolean = $dataTransferObject->boolean;
            $formEntity->time = $dataTransferObject->time;
            $formEntity->date = $dataTransferObject->date;
            $formEntity->datetime = $dataTransferObject->datetime;
            $formEntity->integer = $dataTransferObject->integer;
            $formEntity->float = $dataTransferObject->float;
            $formEntity->text = $dataTransferObject->text;

            return $formEntity;
        }

        return new self(
            $dataTransferObject->string,
            $dataTransferObject->boolean,
            $dataTransferObject->time,
            $dataTransferObject->date,
            $dataTransferObject->datetime,
            $dataTransferObject->integer,
            $dataTransferObject->float,
            $dataTransferObject->text
        );
    }
}
