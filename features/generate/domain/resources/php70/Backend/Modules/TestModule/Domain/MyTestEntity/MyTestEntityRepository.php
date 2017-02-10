<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity;

use Doctrine\ORM\EntityRepository;

class MyTestEntityRepository extends EntityRepository
{
    /**
     * @param MyTestEntity $myTestEntity
     */
    public function add(MyTestEntity $myTestEntity)
    {
        $this->getEntityManager()->persist($myTestEntity);
    }

    /**
     * @param MyTestEntity $myTestEntity
     */
    public function remove(MyTestEntity $myTestEntity)
    {
        $this->getEntityManager()->remove($myTestEntity);
    }
}
