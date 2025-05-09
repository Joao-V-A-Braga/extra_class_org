<?php

namespace App\Filter;

use App\Filter\Trait\ClassesIntervalTrait;

class TeacherFilter extends AbstractFilter
{
    use ClassesIntervalTrait;

    private ?int $startPendingExtraClasses = 0;
    private ?int $endPendingExtraClasses = 0;

    public function getStartPendingExtraClasses(): ?int
    {
        return $this->startPendingExtraClasses;
    }

    public function setStartPendingExtraClasses(?int $startPendingClasses): TeacherFilter
    {
        $this->startPendingExtraClasses = $startPendingClasses;
        return $this;
    }

    public function getEndPendingExtraClasses(): ?int
    {
        return $this->endPendingExtraClasses;
    }

    public function setEndPendingExtraClasses(?int $endPendingExtraClasses): TeacherFilter
    {
        $this->endPendingExtraClasses = $endPendingExtraClasses;
        return $this;
    }
}