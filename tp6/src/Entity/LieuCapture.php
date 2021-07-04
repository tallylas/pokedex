<?php

namespace App\Entity;

use App\Repository\LieuCaptureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LieuCaptureRepository::class)
 */
class LieuCapture
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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLieuId(): ?int
    {
        return $this->lieuId;
    }

    public function setLieuId(int $lieuId): self
    {
        $this->lieuId = $lieuId;

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
}
