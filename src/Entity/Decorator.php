<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\MappedSuperclass */
abstract class Decorator extends Component
{

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Component", cascade={"all"})
     * @ORM\JoinColumn(name="decorates", referencedColumnName="id")
     */
    protected $decorates;

    /**
     * initialize the decorator
     * @param Component $c
     */
    public function __construct(Component $c)
    {
        $this->setDecorates($c);
    }

    /**
     * (non-PHPdoc)
     * @see Test.Component::getName()
     */
    public function getName()
    {
	    return 'Decorated ' . $this->getDecorates()->getName();
    }

    /**
     * the component being decorated
     * @return Component
     */
    protected function getDecorates()
    {
	    return $this->decorates;
    }

    /**
     * sets the component being decorated
     * @param Component $c
     */
    protected function setDecorates(Component $c)
    {
	    $this->decorates = $c;
    }

}
