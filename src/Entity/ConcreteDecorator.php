<?php

namespace App\Entity;

use App\Entity\Decorator;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class ConcreteDecorator extends Decorator
{

    /** @ORM\Column(type="string", nullable=true) */
    protected $special;

    /**
     * Set special
     * @param string $special
     */
    public function setSpecial($special)
    {
        $this->special = $special;
    }

    /**
     * Get special
     * @return string $special
     */
    public function getSpecial()
    {
        return $this->special;
    }

    /**
     * (non-PHPdoc)
     * @see Test.Component::getName()
     */
    public function getName()
    {
        return '[' . $this->getSpecial()
            . '] ' . parent::getName(); 
    }

}
