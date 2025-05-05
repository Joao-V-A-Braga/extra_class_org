<?php

namespace App\Entity;

use App\Entity\Trait\IDTrait;
use App\Entity\Trait\StatusTrait;
use App\Repository\TeacherRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'teachers')]
#[ORM\Entity(repositoryClass: TeacherRepository::class)]
class Teacher
{
    use IDTrait, StatusTrait;

    #[ORM\OneToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $user;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private string $firstName;

    #[ORM\Column(type: Types::STRING, length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(type: Types::INTEGER)]
    private int $classes = 0; //Per month - Real classes

    #[ORM\Column(type: Types::INTEGER)]
    private int $pendingExtraClasses = 0; //In month

    #[ORM\ManyToMany(targetEntity: SchoolSUbject::class, inversedBy: 'teachers')]
    private Collection $schoolSubjects;

    public function __construct()
    {
        $this->schoolSubjects = new ArrayCollection();
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): Teacher
    {
        $this->user = $user;
        return $this;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): Teacher
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): Teacher
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getClasses(): int
    {
        return $this->classes;
    }

    public function setClasses(int $classes): Teacher
    {
        $this->classes = $classes;
        return $this;
    }

    public function getPendingExtraClasses(): int
    {
        return $this->pendingExtraClasses;
    }

    public function setPendingExtraClasses(int $pendingExtraClasses): Teacher
    {
        $this->pendingExtraClasses = $pendingExtraClasses;
        return $this;
    }

    public function getSchoolSubjects(): Collection
    {
        return $this->schoolSubjects;
    }

    public function setSchoolSubjects(Collection $schoolSubjects): Teacher
    {
        $this->schoolSubjects = $schoolSubjects;
        return $this;
    }
}