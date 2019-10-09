<?php

namespace App\Controller;

use App\Entity\Persona;
use App\QueryFunction\GetMembresias;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(EntityManagerInterface $em, GetMembresias $membresias)
    {


        dump($membresias());

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}
