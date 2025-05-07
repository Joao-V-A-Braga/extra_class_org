<?php

namespace App\Entity;

use App\Constants\SerializerGroups;
use App\Entity\Trait\IDTrait;
use App\Entity\Trait\StatusTrait;

use App\Entity\Trait\ToArrayTrait;
use App\Repository\MetricRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

#[ORM\Table(name: 'metrics')]
#[ORM\Entity(repositoryClass: MetricRepository::class)]
class Metric
{
    use IDTrait, StatusTrait, ToArrayTrait;

    #[ORM\Column(type: Types::INTEGER)]
    #[Serializer\Groups([SerializerGroups::DEFAULT])]
    private int $classes = 0; //Per month - Real classes

    #[ORM\Column(type: Types::FLOAT)]
    #[Serializer\Groups([SerializerGroups::DEFAULT])]
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