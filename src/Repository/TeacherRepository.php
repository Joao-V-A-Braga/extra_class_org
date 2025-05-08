<?php

namespace App\Repository;

use App\Entity\SchoolSubject;
use App\Entity\Teacher;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
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
}
