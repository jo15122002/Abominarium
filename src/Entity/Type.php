<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Abomistar::class, mappedBy: 'types')]
    private Collection $abomistars;

    #[ORM\ManyToMany(targetEntity: Type::class)]
    private Collection $weaknesses;

    #[ORM\ManyToMany(targetEntity: Type::class)]
    private Collection $strengths;

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
            $abomistar->addType($this);
        }

        return $this;
    }

    public function removeAbomistar(Abomistar $abomistar): self
    {
        if ($this->abomistars->removeElement($abomistar)) {
            $abomistar->removeType($this);
        }

        return $this;
    }

    /**
     * @return Collection
     */
    public function getWeaknesses(): Collection
    {
        return $this->weaknesses;
    }

    /**
     * @param Collection $weaknesses
     */
    public function setWeaknesses(Collection $weaknesses): void
    {
        $this->weaknesses = $weaknesses;
    }

    /**
     * @return Collection
     */
    public function getStrengths(): Collection
    {
        return $this->strengths;
    }

    /**
     * @param Collection $strengths
     */
    public function setStrengths(Collection $strengths): void
    {
        $this->strengths = $strengths;
    }
}
