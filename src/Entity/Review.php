<?php

namespace App\Entity;

use App\Entity\Trait\IDTrait;
use App\Entity\Trait\StatusTrait;
use App\Repository\ReviewRepository;
use DateTime;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table]
#[ORM\Entity(repositoryClass: ReviewRepository::class)]
class Review
{
    use IDTrait, StatusTrait;

    #[ORM\OneToOne(targetEntity: Teacher::class, inversedBy: 'reviews')]
    private Teacher $teacher;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?DateTime $date = null;

    #[ORM\Column(type: Types::FLOAT)]
    private ?float $systemHours = null;

    #[ORM\Column(type: Types::FLOAT)]
    private ?float $declaredHours = null;

    #[ORM\Column(type: Types::FLOAT)]
    private ?float $approvedHours = null;

    #[ORM\Column(type: Types::STRING, length: 50)]
    private string $situation;

    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $isApproved = false;

    #[ORM\ManyToOne(targetEntity: Teacher::class)]
    private ?User $approvedBy = null;

    #[ORM\ManyToOne(targetEntity: Teacher::class)]
    private ?User $rejectedBy = null;

    public function getTeacher(): Teacher
    {
        return $this->teacher;
    }

    public function setTeacher(Teacher $teacher): Review
    {
        $this->teacher = $teacher;
        return $this;
    }

    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    public function setDate(?DateTime $date): Review
    {
        $this->date = $date;
        return $this;
    }

    public function getSystemHours(): ?float
    {
        return $this->systemHours;
    }

    public function setSystemHours(?float $systemHours): Review
    {
        $this->systemHours = $systemHours;
        return $this;
    }

    public function getDeclaredHours(): ?float
    {
        return $this->declaredHours;
    }

    public function setDeclaredHours(?float $declaredHours): Review
    {
        $this->declaredHours = $declaredHours;
        return $this;
    }

    public function getSituation(): string
    {
        return $this->situation;
    }

    public function setSituation(string $situation): Review
    {
        $this->situation = $situation;
        return $this;
    }

    public function getApprovedHours(): ?float
    {
        return $this->approvedHours;
    }

    public function setApprovedHours(?float $approvedHours): Review
    {
        $this->approvedHours = $approvedHours;
        return $this;
    }

    public function isApproved(): bool
    {
        return $this->isApproved;
    }

    public function setIsApproved(bool $isApproved): Review
    {
        $this->isApproved = $isApproved;
        return $this;
    }

    public function getApprovedBy(): ?User
    {
        return $this->approvedBy;
    }

    public function setApprovedBy(?User $approvedBy): Review
    {
        $this->approvedBy = $approvedBy;
        return $this;
    }

    public function getRejectedBy(): ?User
    {
        return $this->rejectedBy;
    }

    public function setRejectedBy(?User $rejectedBy): Review
    {
        $this->rejectedBy = $rejectedBy;
        return $this;
    }
}
