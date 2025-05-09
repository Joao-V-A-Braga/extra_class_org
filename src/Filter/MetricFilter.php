<?php

namespace App\Filter;

use App\Filter\Trait\ClassesIntervalTrait;

class MetricFilter extends AbstractFilter
{
    use ClassesIntervalTrait;
    private ?float $startMountHours = 0;
    private ?float $endMountHours = 0;

    public function getStartMountHours(): ?float
    {
        return $this->startMountHours;
    }

    public function setStartMountHours(?float $startMountHours): MetricFilter
    {
        $this->startMountHours = $startMountHours;
        return $this;
    }

    public function getEndMountHours(): ?float
    {
        return $this->endMountHours;
    }

    public function setEndMountHours(?float $endMountHours): MetricFilter
    {
        $this->endMountHours = $endMountHours;
        return $this;
    }
}