<?php

namespace App\DataFixtures;

use App\Entity\Grptags;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GrptagsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        
        $grptag=new Grptags();
        $grptag->setlibelle("Lib GRPTAG");

        $manager->persist($grptag);
        $manager->flush();
    }
}
