<?php

namespace App\Entity;

use App\Repository\CapacityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CapacityRepository::class)]
class Capacity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\ManyToMany(targetEntity: Abomistar::class, mappedBy: 'capacities')]
    private Collection $user;

    public function __construct()
    {
        $this->abomistars = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Abomistar>
     */
    public function getAbomistars(): Collection
    {
        return $this->abomistars;
    }

    public function addAbomistar(Abomistar $abomistar): self
    {
        if (!$this->abomistars->contains($abomistar)) {
            $this->abomistars->add($abomistar);
            $abomistar->addCapacity($this);
        }

        return $this;
    }

    public function removeAbomistar(Abomistar $abomistar): self
    {
        if ($this->abomistars->removeElement($abomistar)) {
            $abomistar->removeCapacity($this);
        }

        return $this;
    }
}
