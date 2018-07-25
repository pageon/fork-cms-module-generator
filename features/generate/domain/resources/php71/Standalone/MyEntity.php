<?php

namespace Standalone;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="MyEntity")
 * @ORM\Entity
 */
final class MyEntity
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): int
    {
        return $this->id;
    }

    public static function fromDataTransferObject(MyEntityDataTransferObject $dataTransferObject): self
    {
        if ($dataTransferObject->hasExistingMyEntity()) {
            return $dataTransferObject->getMyEntityEntity();
        }

        return new self();
    }
}
