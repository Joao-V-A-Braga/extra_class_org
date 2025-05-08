<?php

namespace App\Repository;

use App\Entity\SchoolSubject;
use App\Filter\AbstractFilter;
use App\Filter\SchoolSubjectFilter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SchoolSubject>
 */
class SchoolSubjectRepository extends AbstractRepository
{
    protected static mixed $class = SchoolSubject::class;
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry);
    }

    public function findByFilter(AbstractFilter|SchoolSubjectFilter $filter): Query
    {
        $qb = parent::findByFilter($filter->setQueryReturn(false));

        if ($filter->getStartClasses())
            $qb
                ->andWhere('entity.classes >= :startClasses')
                ->setParameter('startClasses', $filter->getStartClasses());
        if ($filter->getEndClasses())
            $qb
                ->andWhere('entity.classes <= :endClasses')
                ->setParameter('endClasses', $filter->getEndClasses());

        return $qb->getQuery();
    }
}
