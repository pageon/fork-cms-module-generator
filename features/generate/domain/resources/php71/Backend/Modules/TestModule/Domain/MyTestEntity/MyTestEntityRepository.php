<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class MyTestEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MyTestEntity::class);
    }

    public function add(MyTestEntity $myTestEntity): void
    {
        $this->getEntityManager()->persist($myTestEntity);
    }

    public function remove(MyTestEntity $myTestEntity): void
    {
        $this->getEntityManager()->remove($myTestEntity);
    }
}
