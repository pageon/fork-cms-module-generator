<?php

namespace Standalone;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="MyEntityWithOneNullableParameter")
 * @ORM\Entity
 */
final class MyEntityWithOneNullableParameter
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

    public function __construct(
        string $parameter1
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
