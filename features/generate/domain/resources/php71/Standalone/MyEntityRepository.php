<?php

namespace Standalone;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class MyEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MyEntity::class);
    }

    public function add(MyEntity $myEntity): void
    {
        $this->getEntityManager()->persist($myEntity);
    }

    public function remove(MyEntity $myEntity): void
    {
        $this->getEntityManager()->remove($myEntity);
    }
}
