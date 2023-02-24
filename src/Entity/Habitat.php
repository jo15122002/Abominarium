<?php

namespace App\Entity;

use App\Repository\HabitatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HabitatRepository::class)]
class Habitat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $anecdotes = [];

    #[ORM\OneToMany(mappedBy: 'habitat', targetEntity: Abomistar::class, orphanRemoval: true)]
    private Collection $inhabitants;

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

    public function getAnecdotes(): array
    {
        return $this->anecdotes;
    }

    public function setAnecdotes(?array $anecdotes): self
    {
        $this->anecdotes = $anecdotes;

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
            $abomistar->setHabitat($this);
        }

        return $this;
    }

    public function removeAbomistar(Abomistar $abomistar): self
    {
        if ($this->abomistars->removeElement($abomistar)) {
            // set the owning side to null (unless already changed)
            if ($abomistar->getHabitat() === $this) {
                $abomistar->setHabitat(null);
            }
        }

        return $this;
    }
}
