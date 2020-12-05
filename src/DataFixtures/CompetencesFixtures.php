<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Apprenant;
use App\Entity\Competences;
use App\Entity\Grpecompetences;
use App\Entity\Grptags;
use App\Entity\Tags;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CompetencesFixtures extends Fixture implements DependentFixtureInterface
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

        $grpcompt=new Grpecompetences();
        $grpcompt->setlibelle("Lib GrpeCompetences 1");
        $grpcompt->setDescription("Juste un test pour mon Groupe de commpetences");

        $manager->persist($grpcompt);

        $tag=new Competences();
        $tag->setlibelle("libelle 1");
        $tag->setDescription("Libelle for Competences");
        // $tag->setGrpecompetences($grpcompt);
       
        $manager->persist($tag);

        // $tag1=new Tags();
        // $tag1->setlibelle("libelle 2");
        // $tag1->setGrptags($grptag);
       
        // $manager->persist($tag1);
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            GrptagsFixtures::class,
        );
    }
}
