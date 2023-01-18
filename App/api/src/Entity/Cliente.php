<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClienteRepository::class)]
class Cliente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\Column]
    private ?int $idPersona = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPersona(): ?string
    {
        return $this->idPersona;
    }

    public function setIdPersona(int $idPersona): self
    {
        $this->idPersona = $idPersona;

        return $this;
    }
}
