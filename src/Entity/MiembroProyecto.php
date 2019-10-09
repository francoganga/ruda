<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MiembroProyectoRepository")
 */
class MiembroProyecto
{
    /**
     * @ORM\Column(type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Proyecto", inversedBy="miembros")
     */
    private $proyecto;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Persona", inversedBy="membresias")
     */
    private $persona;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RolProyecto", inversedBy="miembros")
     */
    private $rolProyecto;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPersona(): ?Persona
    {
        return $this->persona;
    }

    public function setPersona(?Persona $persona): self
    {
        $this->persona = $persona;

        return $this;
    }

    public function getRolProyecto(): ?RolProyecto
    {
        return $this->rolProyecto;
    }

    public function setRolProyecto(?RolProyecto $rolProyecto): self
    {
        $this->rolProyecto = $rolProyecto;

        return $this;
    }
}
