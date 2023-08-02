<?php

namespace App\Entity;

use App\Repository\ExperienceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ExperienceRepository::class)]
class Experience {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $debut = null;

    #[Assert\GreaterThanOrEqual(propertyPath: 'debut')]
    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fin = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lieu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $etablissement = null;

    function __toString(): string {
        return $this->titre;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getTitre(): ?string {
        return $this->titre;
    }

    public function setTitre(string $titre): static {
        $this->titre = $titre;

        return $this;
    }

    public function getDebut(): ?\DateTimeInterface {
        return $this->debut;
    }

    public function setDebut(\DateTimeInterface $debut): static {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface {
        return $this->fin;
    }

    public function setFin(?\DateTimeInterface $fin): static {
        $this->fin = $fin;

        return $this;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(?string $description): static {
        $this->description = $description;

        return $this;
    }

    public function getLieu(): ?string {
        return $this->lieu;
    }

    public function setLieu(?string $lieu): static {
        $this->lieu = $lieu;

        return $this;
    }

    public function getEtablissement(): ?string {
        return $this->etablissement;
    }

    public function setEtablissement(?string $etablissement): static {
        $this->etablissement = $etablissement;

        return $this;
    }
}
