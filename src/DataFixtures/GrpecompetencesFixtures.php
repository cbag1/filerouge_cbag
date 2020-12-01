<?php

namespace App\DataFixtures;

use App\Entity\Grpecompetences;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GrpecompetencesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        
        $grpcomp=new Grpecompetences();
        $grpcomp->setlibelle("Lib GRPTAG");
        $grpcomp->setDescription("Juste un test pour mon Groupe de commpetences");

        $manager->persist($grpcomp);
        $manager->flush();
    }
}
