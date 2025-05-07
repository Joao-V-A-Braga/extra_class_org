<?php

namespace App\Service;

use App\Filter\AbstractFilter;
use App\Repository\AbstractRepository;
use Doctrine\ORM\Query;

class AbstractEntityService
{
    protected AbstractRepository $repository;

    public function findByFilter(AbstractFilter $filter): Query
    {
        return $this->repository->findByFilter($filter);
    }
}