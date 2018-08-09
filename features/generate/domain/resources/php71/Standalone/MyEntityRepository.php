<?php

namespace Standalone;

use Common\Locale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Query\Expr\Join;

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

    public function findBySlugAndLocale(string $slug, Locale $locale): ?MyEntity
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
