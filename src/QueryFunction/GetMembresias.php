<?php

namespace App\QueryFunction;

use Doctrine\ORM\EntityManagerInterface;

/**
 * Class getMembresias
 * @author Franco Ganga
 */
final class GetMembresias
{
    /** @var EntityManagerInterface */
    private $em;
    
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function __invoke()
    {
        $qb = $this->em->createQueryBuilder();

        $result = $qb->select('p')
            ->from('App\Entity\Persona', 'p')
            ->getQuery()
            ->getResult()
            ;

        return $result;
    }
}
