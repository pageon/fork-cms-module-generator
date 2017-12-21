<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity;

use Doctrine\ORM\EntityRepository;

class MyTestEntityRepository extends EntityRepository
{
    public function add(MyTestEntity $myTestEntity): void
    {
        $this->getEntityManager()->persist($myTestEntity);
    }

    public function remove(MyTestEntity $myTestEntity): void
    {
        $this->getEntityManager()->remove($myTestEntity);
    }
}
