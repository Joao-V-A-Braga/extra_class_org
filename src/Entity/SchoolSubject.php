<?php

namespace App\Entity;

use App\Entity\Trait\IDTrait;
use App\Entity\Trait\StatusTrait;
use App\Repository\SchoolSubjectRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'school_subjects')]
#[ORM\Entity(repositoryClass: SchoolSubjectRepository::class)]
class SchoolSubject
{
    use IDTrait, StatusTrait;

    #[ORM\Column(type: Types::STRING)]
    private ?string $name = null;

    #[ORM\Column(type: Types::INTEGER)]
    private int $classes = 0;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): SchoolSubject
    {
        $this->name = $name;
        return $this;
    }

    public function getClasses(): int
    {
        return $this->classes;
    }

    public function setClasses(int $classes): SchoolSubject
    {
        $this->classes = $classes;
        return $this;
    } //Per month - Real classes
}