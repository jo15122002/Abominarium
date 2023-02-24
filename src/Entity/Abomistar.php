<?php

namespace App\Entity;

use App\Repository\AbomistarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AbomistarRepository::class)]
class Abomistar
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 1024, nullable: true)]
    private ?string $imageUrl = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?float $size = null;

    #[ORM\Column]
    private ?int $weight = null;

    #[ORM\ManyToMany(targetEntity: Capacity::class, inversedBy: 'user')]
    private Collection $capacities;

    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'abomistars')]
    private Collection $types;

    #[ORM\ManyToOne(inversedBy: 'inhabitants')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Habitat $habitat = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $anecdotes = [];

    #[ORM\Column(length: 255)]
    private ?string $alimentation = null;

    #[ORM\OneToOne(targetEntity: Abomistar::class)]
    private ?Abomistar $previousEvolution;

    #[ORM\OneToOne(targetEntity: Abomistar::class)]
    private ?Abomistar $nextEvolution;

    public function __construct()
    {
        $this->capacities = new ArrayCollection();
        $this->types = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(?string $imageUrl): self
    {
        $this->imageUrl = $imageUrl;

        return $this;
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

    public function getSize(): ?float
    {
        return $this->size;
    }

    public function setSize(float $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return Collection<int, Capacity>
     */
    public function getCapacities(): Collection
    {
        return $this->capacities;
    }

    public function addCapacity(Capacity $capacity): self
    {
        if (!$this->capacities->contains($capacity)) {
            $this->capacities->add($capacity);
        }

        return $this;
    }

    public function removeCapacity(Capacity $capacity): self
    {
        $this->capacities->removeElement($capacity);

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getTypes(): Collection
    {
        return $this->types;
    }

    public function addType(Type $type): self
    {
        if (!$this->types->contains($type)) {
            $this->types->add($type);
        }

        return $this;
    }

    public function removeType(Type $type): self
    {
        $this->types->removeElement($type);

        return $this;
    }

    public function getHabitat(): ?Habitat
    {
        return $this->habitat;
    }

    public function setHabitat(?Habitat $habitat): self
    {
        $this->habitat = $habitat;

        return $this;
    }

    public function getAnecdotes(): array
    {
        return $this->anecdotes;
    }

    public function setAnecdotes(array $anecdotes): self
    {
        $this->anecdotes = $anecdotes;

        return $this;
    }

    public function getAlimentation(): ?string
    {
        return $this->alimentation;
    }

    public function setAlimentation(string $alimentation): self
    {
        $this->alimentation = $alimentation;

        return $this;
    }

    /**
     * @return Abomistar|null
     */
    public function getNextEvolution(): ?Abomistar
    {
        return $this->nextEvolution;
    }

    /**
     * @param Abomistar|null $nextEvolution
     */
    public function setNextEvolution(?Abomistar $nextEvolution): void
    {
        $this->nextEvolution = $nextEvolution;
    }
    /**
     * @return Abomistar|null
     */
    public function getPreviousEvolution(): ?Abomistar
    {
        return $this->previousEvolution;
    }

    /**
     * @param Abomistar|null $previousEvolution
     */
    public function setPreviousEvolution(?Abomistar $previousEvolution): void
    {
        $this->previousEvolution = $previousEvolution;
    }
}
