<?php

namespace App\Entity;

use App\Traits\NombreTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RolProyectoRepository")
 */
class RolProyecto
{
    use NombreTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MiembroProyecto", mappedBy="rolProyecto")
     */
    private $miembros;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Proyecto", inversedBy="roles")
     */
    private $proyecto;

    public function __construct()
    {
        $this->miembros = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|MiembroProyecto[]
     */
    public function getMiembros(): Collection
    {
        return $this->miembros;
    }

    public function addMiembro(MiembroProyecto $miembro): self
    {
        if (!$this->miembros->contains($miembro)) {
            $this->miembros[] = $miembro;
            $miembro->setRolProyecto($this);
        }

        return $this;
    }

    public function removeMiembro(MiembroProyecto $miembro): self
    {
        if ($this->miembros->contains($miembro)) {
            $this->miembros->removeElement($miembro);
            // set the owning side to null (unless already changed)
            if ($miembro->getRolProyecto() === $this) {
                $miembro->setRolProyecto(null);
            }
        }

        return $this;
    }

    public function getProyecto(): ?Proyecto
    {
        return $this->proyecto;
    }

    public function setProyecto(?Proyecto $proyecto): self
    {
        $this->proyecto = $proyecto;

        return $this;
    }
}
