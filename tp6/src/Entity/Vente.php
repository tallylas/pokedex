<?php

namespace App\Entity;

use App\Repository\VenteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VenteRepository::class)
 */
class Vente
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
     * @ORM\Column(type="integer")
     */
    private $prix;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPokemonId(): ?int
    {
        return $this->PokemonId;
    }

    public function setPokemonId(int $PokemonId): self
    {
        $this->PokemonId = $PokemonId;

        return $this;
    }

    public function getDresseurId(): ?int
    {
        return $this->dresseurId;
    }

    public function setDresseurId(int $dresseurId): self
    {
        $this->dresseurId = $dresseurId;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getPokemonCaptureId(): ?PokemonRef
    {
        return $this->pokemon_capture_id;
    }

    public function setPokemonCaptureId(?PokemonRef $pokemon_capture_id): self
    {
        $this->pokemon_capture_id = $pokemon_capture_id;

        return $this;
    }
}
