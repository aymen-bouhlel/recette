<?php

namespace App\DataFixtures;

use App\Entity\Type;
use App\Entity\Aliment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $type1 = new Type();
        $type1->setLibelle("Fruits")
            ->setImage("fruits.jpg")
        ;
        $manager->persist($type1);

        $type2 = new Type();
        $type2->setLibelle("Legumes")
            ->setImage("legumes.jpg")
        ;
        $manager->persist($type2);

        // ASSOCIER A CHAQUE ALIMENT UN TYPE
        $alimentRepository = $manager->getRepository(Aliment::class);
        // RECUPÉRER L'ALIMENT PATATE
        $a1 = $alimentRepository->findOneBy(["nom" => "patate"]);
        $a1->setType($type2);
        $manager->persist($a1);

        // RECUPÉRER L'ALIMENT TOMATE
        $a2 = $alimentRepository->findOneBy(["nom" => "tomate"]);
        $a2->setType($type2);
        $manager->persist($a2);

        // RECUPÉRER L'ALIMENT POMME
        $a3 = $alimentRepository->findOneBy(["nom" => "pomme"]);
        $a3->setType($type1);
        $manager->persist($a3);

        $manager->flush();
    }
}
