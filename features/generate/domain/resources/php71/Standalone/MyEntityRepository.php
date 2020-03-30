<?php

namespace Standalone;

use Common\Core\Model;
use Common\Locale;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Query\Expr\Join;

/**
 * @method MyEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method MyEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method MyEntity[] findAll()
 * @method MyEntity[] findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
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

    /**
     * @TODO remove when entity doesn't use meta
     */
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

    /**
     * @TODO remove when entity doesn't use meta
     */
    public function getUrl(string $url, Locale $locale, int $id = null): string
    {
        $query = $this
            ->createQueryBuilder('i')
            ->select('COUNT(i)')
            ->innerJoin('i.meta', 'm')
            ->where('m.url = :url and i.locale = :locale')
            ->setParameter('url', $url)
            ->setParameter('locale', $locale);

        if ($id !== null) {
            $query
                ->andWhere('i.id != :id')
                ->setParameter('id', $id);
        }

        if ((int)$query->getQuery()->getSingleScalarResult() === 0) {
            return $url;
        }

        return $this->getUrl(Model::addNumber($url), $locale, $id);
    }
}
