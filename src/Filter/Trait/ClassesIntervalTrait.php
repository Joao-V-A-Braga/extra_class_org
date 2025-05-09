<?php

namespace App\Filter\Trait;

trait ClassesIntervalTrait
{
    private ?int $startClasses = 0;
    private ?int $endClasses = 0;

    public function getStartClasses(): ?int
    {
        return $this->startClasses;
    }

    public function setStartClasses(?int $startClasses): self
    {
        $this->startClasses = $startClasses;
        return $this;
    }

    public function getEndClasses(): ?int
    {
        return $this->endClasses;
    }

    public function setEndClasses(?int $endClasses): self
    {
        $this->endClasses = $endClasses;
        return $this;
    }
}