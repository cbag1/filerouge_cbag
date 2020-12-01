<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\cm;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CMFixtures extends Fixture implements DependentFixtureInterface
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
        $cm = new cm();
        $cm->setUsername('cbag_cm');
        $pass  =  $this->password->encodePassword($cm, "cbagcm");
        $cm->setPassword($pass);
        $cm->setPrenom($faker->firstName);
        $cm->setNom($faker->lastName);
        $cm->setTelephone($faker->phoneNumber);
        $cm->setEmail($faker->email);
        $cm->setArchive(false);
        $cm->setProfil($this->getReference(ProfilFixtures::PROFIL_CM_REFERENCE));


        $manager->persist($cm);
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            ProfilFixtures::class,
        );
    }
}
