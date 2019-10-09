<?php

namespace App\DataFixtures;

use App\Entity\MiembroProyecto;
use App\Entity\Persona;
use App\Entity\Proyecto;
use App\Entity\RolProyecto;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        $rol = new RolProyecto();
        $rol->setNombre("Investigador");

        $proyecto = new Proyecto();
        $proyecto->setNombre("RUDA");

        for ($i = 0; $i < 10; $i++) {
            $persona = new Persona();
            $persona->setNombre($faker->firstName);
            $persona->setApellido($faker->lastName);
            $mp = new MiembroProyecto();
            $mp->setPersona($persona);
            $mp->setRolProyecto($rol);
            $mp->setProyecto($proyecto);

            $manager->persist($persona);
            $manager->persist($proyecto);
            $manager->persist($mp);
            $manager->persist($rol);
        }



        $manager->flush();
    }
}
