<?php

namespace App\Entity;

use App\Entity\Trait\IDTrait;
use App\Entity\Trait\StatusTrait;

use App\Repository\MetricsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'metrics')]
#[ORM\Entity(repositoryClass: MetricsRepository::class)]
class Metric
{
    use IDTrait, StatusTrait;

    #[ORM\Column(type: Types::INTEGER)]
    private int $classes = 0; //Per month - Real classes

    #[ORM\Column(type: Types::FLOAT)]
    private int $monthHours = 0;

    public function getClasses(): int
    {
        return $this->classes;
    }

    public function setClasses(int $classes): Metric
    {
        $this->classes = $classes;
        return $this;
    }

    public function getMonthHours(): int
    {
        return $this->monthHours;
    }

    public function setMonthHours(int $monthHours): Metric
    {
        $this->monthHours = $monthHours;
        return $this;
    }
}