<?php

namespace App\Filter;

use App\Filter\Trait\ClassesIntervalTrait;

class SchoolSubjectFilter extends AbstractFilter
{
    use ClassesIntervalTrait;
    private ?string $name;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): SchoolSubjectFilter
    {
        $this->name = $name;
        return $this;
    }
}