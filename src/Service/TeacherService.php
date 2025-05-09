<?php

namespace App\Service;

use App\Repository\TeacherRepository;
use Doctrine\ORM\EntityManagerInterface;

class TeacherService extends AbstractEntityService
{
    public function __construct(TeacherRepository $repository, EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
        $this->repository = $repository;
    }
}