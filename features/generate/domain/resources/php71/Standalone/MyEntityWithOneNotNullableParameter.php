<?php

namespace Standalone;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="MyEntityWithOneNotNullableParameter")
 * @ORM\Entity(repositoryClass="Standalone\MyEntityWithOneNotNullableParameterRepository")
 */
final class MyEntityWithOneNotNullableParameter
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

    public function __construct(
        string $parameter1
    ) {
        $this->parameter1 = $parameter1;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getParameter1(): string
    {
        return $this->parameter1;
    }

    public static function fromDataTransferObject(MyEntityWithOneNotNullableParameterDataTransferObject $dataTransferObject): self
    {
        if ($dataTransferObject->hasExistingMyEntityWithOneNotNullableParameter()) {
            $myEntityWithOneNotNullableParameter = $dataTransferObject->getMyEntityWithOneNotNullableParameterEntity();
            $myEntityWithOneNotNullableParameter->parameter1 = $dataTransferObject->parameter1;

            return $myEntityWithOneNotNullableParameter;
        }

        return new self(
            $dataTransferObject->parameter1
        );
    }
}
