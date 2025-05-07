<?php

namespace App\Service;

use App\Repository\MetricRepository;

class MetricService extends AbstractEntityService
{
    public function __construct(MetricRepository $repository)
    {
        $this->repository = $repository;
    }
}