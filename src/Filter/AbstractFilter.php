<?php

namespace App\Filter;

class AbstractFilter
{
    protected string|null $q = null;
    protected string $status = 'ACTIVE';
    protected int|null $perPage = null;
    protected int|null $page = null;

    // Aux
    protected bool|null $queryReturn = true;

    public function getQ(): ?string
    {
        return $this->q;
    }

    public function setQ(?string $q): self
    {
        $this->q = $q;
        return $this;
    }

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

    // Aux
    public function isQueryReturn(): bool
    {
        return $this->queryReturn;
    }

    public function setQueryReturn(bool $queryReturn): AbstractFilter
    {
        $this->queryReturn = $queryReturn;
        return $this;
    }
}