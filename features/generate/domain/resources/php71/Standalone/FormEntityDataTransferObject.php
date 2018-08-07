<?php

namespace Standalone;

use Symfony\Component\Validator\Constraints as Assert;

class FormEntityDataTransferObject
{
    /**
     * @var FormEntity
     */
    private $formEntityEntity;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="err.FieldIsRequired")
     */
    public $string;

    /**
     * @var bool
     *
     * @Assert\NotBlank(message="err.FieldIsRequired")
     */
    public $boolean;

    /**
     * @var \DateTime
     *
     * @Assert\NotBlank(message="err.FieldIsRequired")
     */
    public $time;

    /**
     * @var \DateTime
     *
     * @Assert\NotBlank(message="err.FieldIsRequired")
     */
    public $date;

    /**
     * @var \DateTime
     *
     * @Assert\NotBlank(message="err.FieldIsRequired")
     */
    public $datetime;

    /**
     * @var int
     *
     * @Assert\NotBlank(message="err.FieldIsRequired")
     */
    public $integer;

    /**
     * @var float
     *
     * @Assert\NotBlank(message="err.FieldIsRequired")
     */
    public $float;

    /**
     * @var string
     *
     * @Assert\NotBlank(message="err.FieldIsRequired")
     */
    public $text;

    public function __construct(FormEntity $formEntity = null)
    {
        $this->formEntityEntity = $formEntity;

        if (!$this->hasExistingFormEntity()) {
            return;
        }

        $this->string = $this->formEntityEntity->getString();
        $this->boolean = $this->formEntityEntity->isBoolean();
        $this->time = $this->formEntityEntity->getTime();
        $this->date = $this->formEntityEntity->getDate();
        $this->datetime = $this->formEntityEntity->getDatetime();
        $this->integer = $this->formEntityEntity->getInteger();
        $this->float = $this->formEntityEntity->getFloat();
        $this->text = $this->formEntityEntity->getText();
    }

    public function getFormEntityEntity(): FormEntity
    {
        return $this->formEntityEntity;
    }

    public function hasExistingFormEntity(): bool
    {
        return $this->formEntityEntity instanceof FormEntity;
    }
}
