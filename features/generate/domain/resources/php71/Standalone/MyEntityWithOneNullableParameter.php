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
}
