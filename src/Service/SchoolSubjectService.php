<?php

namespace App\Service;

use App\Repository\SchoolSubjectRepository;
use Doctrine\ORM\EntityManagerInterface;

class SchoolSubjectService extends AbstractEntityService
{
    public function __construct(SchoolSubjectRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
        $this->repository = $repository;
    }
}