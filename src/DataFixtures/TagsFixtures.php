<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Apprenant;
use App\Entity\Grptags;
use App\Entity\Tags;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class TagsFixtures extends Fixture implements DependentFixtureInterface
{

    private $password;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->password = $encoder;
    }

    

    public function load(ObjectManager $manager)
    {

        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr_FR');

        $grptag=new Grptags();
        $grptag->setlibelle("Lib GRPTAG 1");

        $manager->persist($grptag);

        $tag=new Tags();
        $tag->setlibelle("libelle 1");
        $tag->setGrptags($grptag);
       
        $manager->persist($tag);

        $tag1=new Tags();
        $tag1->setlibelle("libelle 2");
        $tag1->setGrptags($grptag);
       
        $manager->persist($tag1);
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            GrptagsFixtures::class,
        );
    }
}
