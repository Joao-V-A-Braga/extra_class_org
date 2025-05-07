<?php

namespace App\Filter;

class AbstractFilter
{
    protected string $status = 'ACTIVE';

    protected int|null $perPage = null;
    protected int|null $page = null;

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getPerPage(): ?int
    {
        return $this->perPage;
    }

    public function setPerPage(?int $perPage): AbstractFilter
    {
        $this->perPage = $perPage;
        return $this;
    }

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function setPage(?int $page): AbstractFilter
    {
        $this->page = $page;
        return $this;
    }
}