<?php

namespace App\Entity;

use App\Repository\VentaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VentaRepository::class)]
class Venta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $correlativoDeLaVenta = null;

    #[ORM\Column(length: 255)]
    private ?string $fecha = null;

    #[ORM\Column(length: 255)]
    private ?string $cliente = null;

    #[ORM\Column(type: Types::ARRAY, nullable: true)]
    private array $conjuntoDeDetalleDeProducto = [];

    #[ORM\Column]
    private ?float $montoTotalDeLaVenta = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCorrelativoDeLaVenta(): ?int
    {
        return $this->correlativoDeLaVenta;
    }

    public function setCorrelativoDeLaVenta(int $correlativoDeLaVenta): self
    {
        $this->correlativoDeLaVenta = $correlativoDeLaVenta;

        return $this;
    }

    public function getFecha(): ?string
    {
        return $this->fecha;
    }

    public function setFecha(string $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getCliente(): ?string
    {
        return $this->cliente;
    }

    public function setCliente(string $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getConjuntoDeDetalleDeProducto(): array
    {
        return $this->conjuntoDeDetalleDeProducto;
    }

    public function setConjuntoDeDetalleDeProducto(?array $conjuntoDeDetalleDeProducto): self
    {
        $this->conjuntoDeDetalleDeProducto = $conjuntoDeDetalleDeProducto;

        return $this;
    }

    public function getMontoTotalDeLaVenta(): ?float
    {
        return $this->montoTotalDeLaVenta;
    }

    public function setMontoTotalDeLaVenta(float $montoTotalDeLaVenta): self
    {
        $this->montoTotalDeLaVenta = $montoTotalDeLaVenta;

        return $this;
    }
}
