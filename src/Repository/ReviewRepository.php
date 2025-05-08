<?php

namespace App\Repository;

use App\Entity\Review;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Review>
 */
class ReviewRepository extends AbstractRepository
{
    protected static mixed $class = Review::class;
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry);
    }
}
