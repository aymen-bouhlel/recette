<?php

namespace App\DataFixtures;

use App\Entity\Aliment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $aliment1 = new Aliment();
        // $aliment1->setNom("Carotte")
        //         ->setPrix(1.80)
        //         ->setImage("aliments/carotte.png")
        //         ->setCalorie(36)
        //         ->setProteine(0.77)
        //         ->setGlucide(6.45)
        //         ->setLipide(0.26)  
        // ;
        // $manager->persist($aliment1);

        // $aliment2 = new Aliment();
        // $aliment2->setNom("Patate")
        //         ->setPrix(1.50)
        //         ->setImage("aliments/patate.jpg")
        //         ->setCalorie(80)
        //         ->setProteine(1.80)
        //         ->setGlucide(16.7)
        //         ->setLipide(0.34)  
        // ;
        // $manager->persist($aliment2);

        // $aliment3 = new Aliment();
        // $aliment3->setNom("Tomate")
        //         ->setPrix(2.30)
        //         ->setImage("aliments/tomate.png")
        //         ->setCalorie(18)
        //         ->setProteine(0.86)
        //         ->setGlucide(2.26)
        //         ->setLipide(0.24)  
        // ;
        // $manager->persist($aliment3);

        // $aliment4 = new Aliment();
        // $aliment4->setNom("Pomme")
        //         ->setPrix(2.35)
        //         ->setImage("aliments/pomme.png")
        //         ->setCalorie(52)
        //         ->setProteine(0.25)
        //         ->setGlucide(11.6)
        //         ->setLipide(0.25)  
        // ;
        // $manager->persist($aliment4);
                

        // $manager->flush();
    }
}
