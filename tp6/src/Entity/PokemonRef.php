<?php

namespace App\Entity;

use App\Repository\PokemonRefRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PokemonRefRepository::class)
 */
class PokemonRef
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $pokemonId;

    /**
     * @ORM\Column(type="text")
     */
    private $nom;

    /**
     * @ORM\Column(type="text")
     */
    private $courbeXP;

    /**
     * @ORM\Column(type="boolean")
     */
    private $evolution;

    /**
     * @ORM\ManyToOne(targetEntity="Type")
     * @ORM\JoinColumn(name="type1", referencedColumnName="id")
     */
    private $type1;

    /**
     * @ORM\ManyToOne(targetEntity="Type")
     * @ORM\JoinColumn(name="type2", referencedColumnName="id")
     */
    private $type2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPokemonId(): ?int
    {
        return $this->pokemonId;
    }

    public function setPokemonId(int $pokemonId): self
    {
        $this->pokemonId = $pokemonId;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCourbeXP(): ?string
    {
        return $this->courbeXP;
    }

    public function setCourbeXP(string $courbeXP): self
    {
        $this->courbeXP = $courbeXP;

        return $this;
    }

    public function getEvolution(): ?bool
    {
        return $this->evolution;
    }

    public function setEvolution(bool $evolution): self
    {
        $this->evolution = $evolution;

        return $this;
    }

    public function getType1(): ?Type
    {
        return $this->type1;
    }

    public function setType1(Type $type1): self
    {
        $this->type1 = $type1;

        return $this;
    }

    public function getType2(): ?Type
    {
        return $this->type2;
    }

    public function setType2(?Type $type2): self
    {
        $this->type2 = $type2;

        return $this;
    }
}
