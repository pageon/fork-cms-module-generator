<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="MyTestEntity")
 * @ORM\Entity
 */
final class MyTestEntity
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
}
