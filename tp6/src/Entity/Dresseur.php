<?php

namespace App\Entity;

use App\Repository\DresseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=DresseurRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class Dresseur implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="integer")
     */
    private $coins;

    private $role = [];

    public function __construct()
    {
        $this->pokemon_id = new ArrayCollection();
        array_push($this->role, "Dresseur");
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCoins(): ?int
    {
        return $this->coins;
    }

    public function setCoins(int $coins): self
    {
        $this->coins = $coins;

        return $this;
    }

    /**
     * @return Collection|PokemonRef[]
     */
    public function getPokemonId(): Collection
    {
        return $this->pokemon_id;
    }

    public function addPokemonId(PokemonRef $pokemonId): self
    {
        if (!$this->pokemon_id->contains($pokemonId)) {
            $this->pokemon_id[] = $pokemonId;
        }

        return $this;
    }

    public function removePokemonId(PokemonRef $pokemonId): self
    {
        $this->pokemon_id->removeElement($pokemonId);

        return $this;
    }

    public function getRoles():array
    {
        return $this->$role;
    }

    public function getSalt():?string
    {
        return null;
    }

    public function getUsername():string
    {
       return $this->email;
   }

   public function eraseCredentials() 
   {

   }



}
