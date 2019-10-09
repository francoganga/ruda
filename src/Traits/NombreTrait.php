<?php

namespace App\Traits;

/**
 * Trait NombreTrait
 * @author Franco Ganga
 */
trait NombreTrait
{

    /**
    * @ORM\Column(type="string", length=50)
    */
    private $nombre;

    /**
     * Getter for nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    
    /**
     * Setter for nombre
     *
     * @param string $nombre
     * @return NombreTrait
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }
}
