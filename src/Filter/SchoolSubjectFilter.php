<?php

namespace App\Filter;

class SchoolSubjectFilter extends AbstractFilter
{
    private ?string $name;
    private ?int $startClasses = 0;
    private ?int $endClasses = 0;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): SchoolSubjectFilter
    {
        $this->name = $name;
        return $this;
    }

    public function getStartClasses(): ?int
    {
        return $this->startClasses;
    }

    public function setStartClasses(?int $startClasses): SchoolSubjectFilter
    {
        $this->startClasses = $startClasses;
        return $this;
    }

    public function getEndClasses(): ?int
    {
        return $this->endClasses;
    }

    public function setEndClasses(?int $endClasses): SchoolSubjectFilter
    {
        $this->endClasses = $endClasses;
        return $this;
    }
}