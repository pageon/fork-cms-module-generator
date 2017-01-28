<?php

namespace Backend\Modules\MyModule\Domain\MyEntity;

use Doctrine\ORM\EntityRepository;

class MyEntityRepository extends EntityRepository
{
    /**
     * @param MyEntity $myEntity
     */
    public function add(MyEntity $myEntity)
    {
        $this->getEntityManager()->persist($myEntity);
    }

    /**
     * @param MyEntity $myEntity
     */
    public function remove(MyEntity $myEntity)
    {
        $this->getEntityManager()->remove($myEntity);
    }
}
