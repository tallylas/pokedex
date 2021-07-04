<?php

namespace App\Entity;

use App\Repository\ChasseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChasseRepository::class)
 */
class Chasse
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="PokemonRef")
     * @ORM\JoinColumn(name="pokemon_capture_id", referencedColumnName="id")
     */
    private $pokemon_capture_id;

    /**
     * @ORM\ManyToOne(targetEntity="Dresseur")
     * @ORM\JoinColumn(name="dresseur_id", referencedColumnName="id")
     */
    private $dresseur_id;

    /**
     * @ORM\ManyToOne(targetEntity="LieuCapture")
     * @ORM\JoinColumn(name="lieu_id", referencedColumnName="id")
     */
    private $lieu_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $heureEntrainement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPokemonCaptureId(): ?int
    {
        return $this->PokemonCaptureId;
    }

    public function setPokemonCaptureId(int $PokemonCaptureId): self
    {
        $this->PokemonCaptureId = $PokemonCaptureId;

        return $this;
    }

    public function getDresseurId(): ?int
    {
        return $this->DresseurId;
    }

    public function setDresseurId(int $DresseurId): self
    {
        $this->DresseurId = $DresseurId;

        return $this;
    }

    public function getLieuId(): ?int
    {
        return $this->LieuId;
    }

    public function setLieuId(int $LieuId): self
    {
        $this->LieuId = $LieuId;

        return $this;
    }

    public function getHeureEntrainement(): ?\DateTimeInterface
    {
        return $this->heureEntrainement;
    }

    public function setHeureEntrainement(\DateTimeInterface $heureEntrainement): self
    {
        $this->heureEntrainement = $heureEntrainement;

        return $this;
    }
}
