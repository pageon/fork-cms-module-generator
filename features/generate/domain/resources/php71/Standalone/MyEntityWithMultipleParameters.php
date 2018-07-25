<?php

namespace Standalone;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="MyEntityWithMultipleParameters")
 * @ORM\Entity(repositoryClass="Standalone\MyEntityWithMultipleParametersRepository")
 */
final class MyEntityWithMultipleParameters
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
