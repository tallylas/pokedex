<?php

namespace App\Entity;

use App\Repository\PokemonsCapturesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PokemonsCapturesRepository::class)
 */
class PokemonsCaptures
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Dresseur")
     * @ORM\JoinColumn(name="dresseur_id", referencedColumnName="id")
     */
    private $dresseur_id;

    /**
     * @ORM\ManyToOne(targetEntity="PokemonRef")
     * @ORM\JoinColumn(name="pokemon_id", referencedColumnName="id")
     */
    private $pokemon_id;

    /**
     * @ORM\Column(type="string", length=1)
     */
    private $sexe;

    /**
     * @ORM\Column(type="integer")
     */
    private $niveau;

    /**
     * @ORM\Column(type="integer")
     */
    private $xp;

    public function __construct()
    {
        $this->PokemonId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPokemonId(): ?int
    {
        return $this->PokemonId;
    }

    public function setPokemonId(int $PokemonId): self
    {
        $this->PokemonId = $PokemonId;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getNiveau(): ?int
    {
        return $this->niveau;
    }

    public function setNiveau(int $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getXp(): ?int
    {
        return $this->xp;
    }

    public function setXp(int $xp): self
    {
        $this->xp = $xp;

        return $this;
    }

    public function addPokemonId(PokemonRef $pokemonId): self
    {
        if (!$this->PokemonId->contains($pokemonId)) {
            $this->PokemonId[] = $pokemonId;
        }

        return $this;
    }

    public function removePokemonId(PokemonRef $pokemonId): self
    {
        $this->PokemonId->removeElement($pokemonId);

        return $this;
    }
}
