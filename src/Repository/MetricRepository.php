<?php

namespace App\Repository;

use App\Entity\Metric;
use App\Filter\AbstractFilter;
use App\Filter\MetricFilter;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends AbstractRepository<Metric>
 */
class MetricRepository extends AbstractRepository
{
    protected static string $class = Metric::class;
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry);
    }

    public function findByFilter(AbstractFilter|MetricFilter $filter): Query
    {
        $qb = parent::findByFilter($filter);

        if ($filter->getStartClasses())
            $qb
                ->andWhere('entity.classes >= :startClasses')
                ->setParameter('startClasses', $filter->getStartClasses());
        if ($filter->getEndClasses())
            $qb
                ->andWhere('entity.classes <= :endClasses')
                ->setParameter('endClasses', $filter->getEndClasses());
        if ($filter->getStartMountHours())
            $qb
                ->andWhere('entity.monthHours >= :startMonthHours')
                ->setParameter('startMonthHours', $filter->getStartMountHours());
        if ($filter->getEndMountHours())
            $qb
                ->andWhere('entity.monthHours <= :endMonthHours')
                ->setParameter('endMonthHours', $filter->getEndMountHours());

        return $qb->getQuery();
    }
}
