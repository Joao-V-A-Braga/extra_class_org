<?php

namespace App\Service;

use App\Repository\MetricRepository;
use Doctrine\ORM\EntityManagerInterface;

class MetricService extends AbstractEntityService
{
    public function __construct(MetricRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
        $this->repository = $repository;
    }
}