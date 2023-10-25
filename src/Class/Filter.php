<?php

namespace App\Class;

use App\Entity\Site;

class Filter
{
   
    private ?string $nom = null;
    private ?Site $site = null;
    private ?bool $iOrganize;
    private ?bool $imIn;
    private ?bool $imNotIn;
    private ?bool $passedSortie;
    private ?\DateTimeInterface $startDate = null;
    private ?\DateTimeInterface $endDate = null;

    
    
    public function __construct()
    {
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }
    public function getSite(): ?Site
    {
        return $this->site;
    }

    public function setSite(?Site $site): static
    {
        $this->site = $site;

        return $this;
    }

    public function isIOrganize(): ?bool
    {
        return $this->iOrganize;
    }

    public function setIOrganize(bool $iOrganize): static
    {
        $this->iOrganize = $iOrganize;

        return $this;
    }

    public function isImIn(): ?bool
    {
        return $this->imIn;
    }

    public function setImIn(bool $imIn): static
    {
        $this->imIn = $imIn;

        return $this;
    }  
    
    public function isImNotIn(): ?bool
    {
        return $this->imNotIn;
    }

    public function setImNotIn(bool $imNotIn): static
    {
        $this->imNotIn = $imNotIn;

        return $this;
    }      

    public function isPassedSortie(): ?string
    {
        return $this->passedSortie;
    }

    public function setPassedSortie(string $passedSortie): static
    {
        $this->passedSortie = $passedSortie;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(?\DateTimeInterface $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(?\DateTimeInterface $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

}
