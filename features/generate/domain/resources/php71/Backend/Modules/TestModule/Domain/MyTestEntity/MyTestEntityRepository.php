<?php

namespace Backend\Modules\TestModule\Domain\MyTestEntity;

use Common\Locale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Query\Expr\Join;

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

    public function findBySlugAndLocale(string $slug, Locale $locale): ?MyTestEntity
    {
        try {
            return $this
                ->createQueryBuilder('i')
                ->innerJoin('i.meta', 'm', Join::WITH, 'm.url = :slug AND i.locale = :locale')
                ->setParameter('slug', $slug)
                ->setParameter('locale', $locale)
                ->getQuery()
                ->getSingleResult();
        } catch (NoResultException | NonUniqueResultException $resultException) {
            return null;
        }
    }
}
