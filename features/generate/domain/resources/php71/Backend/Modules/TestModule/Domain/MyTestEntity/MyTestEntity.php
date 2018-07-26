<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="MyTestEntity")
 * @ORM\Entity(repositoryClass="Backend\Modules\TestModule\Domain\MyTestEntity\MyTestEntityRepository")
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

    public function getId(): int
    {
        return $this->id;
    }

    public static function fromDataTransferObject(MyTestEntityDataTransferObject $dataTransferObject): self
    {
        if ($dataTransferObject->hasExistingMyTestEntity()) {
            return $dataTransferObject->getMyTestEntityEntity();
        }

        return new self();
    }
}
