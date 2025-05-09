<?php

namespace App\Repository;

use App\Entity\SchoolSubject;
use App\Entity\Teacher;
use App\Filter\AbstractFilter;
use App\Filter\TeacherFilter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Teacher>
 */
class TeacherRepository extends AbstractRepository
{
    protected static mixed $class = Teacher::class;
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry);
    }

    public function findByFilter(AbstractFilter|TeacherFilter $filter): Query
    {
        $qb = parent::findByFilter($filter->setQueryReturn(false));

        if ($filter->getQ())
            $qb
                ->join('entity.user', 'user')
                ->andWhere(
                    $qb->expr()->orX(
                        $qb->expr()->like('user.email', ':q'),
                        $qb->expr()->like('entity.firstName', ':q'),
                        $qb->expr()->like('entity.lastName', ':q')
                    )
                )
                ->setParameter('q', "%{$filter->getQ()}%");

        if ($filter->getStartClasses())
            $qb
                ->andWhere('entity.classes >= :startClasses')
                ->setParameter('startClasses', $filter->getStartClasses());
        if ($filter->getEndClasses())
            $qb
                ->andWhere('entity.classes <= :endClasses')
                ->setParameter('endClasses', $filter->getEndClasses());

        if ($filter->getStartPendingExtraClasses())
            $qb
                ->andWhere('entity.pendingExtraClasses >= :startExtraClasses')
                ->setParameter('startExtraClasses', $filter->getStartPendingExtraClasses());
        if ($filter->getEndPendingExtraClasses())
            $qb
                ->andWhere('entity.pendingExtraClasses <= :endExtraClasses')
                ->setParameter('endExtraClasses', $filter->getEndPendingExtraClasses());

        return $qb->getQuery();
    }
}
