<?php

namespace App\Filter;

class MetricFilter extends AbstractFilter
{
    private ?int $startClasses = 0;
    private ?int $endClasses = 0;
    private ?float $startMountHours = 0;
    private ?float $endMountHours = 0;

    public function getStartClasses(): ?int
    {
        return $this->startClasses;
    }

    public function setStartClasses(?int $startClasses): MetricFilter
    {
        $this->startClasses = $startClasses;
        return $this;
    }

    public function getEndClasses(): ?int
    {
        return $this->endClasses;
    }

    public function setEndClasses(?int $endClasses): MetricFilter
    {
        $this->endClasses = $endClasses;
        return $this;
    }

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