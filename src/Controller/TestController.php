<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\ConcreteComponent,
    App\Entity\ConcreteDecorator;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(EntityManagerInterface $em)
    {
        // create a new concrete component
        $c = new ConcreteComponent();
        $c->setName('Test Component 1');
        $em->persist($c); // assigned unique ID = 1

        // create a new concrete decorator
        $c = new ConcreteComponent();
        $c->setName('Test Component 2');

        $d = new ConcreteDecorator($c);
        $d->setSpecial('Really');
        $em->persist($d); 
        // assigns c as unique ID = 2, and d as unique ID = 3

        $em->flush();

        $c = $em->find('App\Entity\Component', 1);
        $d = $em->find('App\Entity\Component', 3);

        echo get_class($c)."<br>";
        // prints: Test\Component\ConcreteComponent

        echo $c->getName()."<br>";
        // prints: Test Component 1 

        echo get_class($d)."<br>"; 
        // prints: Test\Component\ConcreteDecorator

        echo $d->getName()."<br>";
        // prints: [Really] Decorated Test Component 2

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
