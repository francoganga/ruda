<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonaRepository")
 */
class Persona
{
    /**
     * @ORM\Column(type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellido;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MiembroProyecto", mappedBy="persona")
     */
    private $membresias;

    public function __construct()
    {
        $this->membresias = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * @return Collection|MiembroProyecto[]
     */
    public function getMembresias(): Collection
    {
        return $this->membresias;
    }

    public function addMembresia(MiembroProyecto $membresia): self
    {
        if (!$this->membresias->contains($membresia)) {
            $this->membresias[] = $membresia;
            $membresia->setPersona($this);
        }

        return $this;
    }

    public function removeMembresia(MiembroProyecto $membresia): self
    {
        if ($this->membresias->contains($membresia)) {
            $this->membresias->removeElement($membresia);
            // set the owning side to null (unless already changed)
            if ($membresia->getPersona() === $this) {
                $membresia->setPersona(null);
            }
        }

        return $this;
    }
}
