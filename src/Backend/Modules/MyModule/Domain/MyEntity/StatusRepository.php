<?php

namespace Backend\Modules\MyModule\Domain\MyEntity;

use Doctrine\ORM\EntityRepository;

class StatusRepository extends EntityRepository
{
    /**
     * @param Appeal $appeal
     */
    public function add(Appeal $appeal)
    {
        $this->getEntityManager()->persist($appeal);
    }

    /**
     * @param Status $status
     */
    public function remove(Status $status)
    {
        $this->getEntityManager()->remove($status);
    }
}
