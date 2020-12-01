<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Apprenant;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ApprenantFixtures extends Fixture implements DependentFixtureInterface
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
        $apprenant=new Apprenant();
        $apprenant->setUsername('cbag');
        $pass  =  $this -> password -> encodePassword($apprenant, "cbag");
        $apprenant->setPassword($pass);
        $apprenant->setPrenom($faker->firstName);
        $apprenant->setNom($faker->lastName);
        $apprenant->setTelephone($faker->phoneNumber);
        $apprenant->setEmail($faker->email  );
        $apprenant->setNiveau("Niveau 1");
        $apprenant->setAdresse($faker->address);
        $apprenant->setStatut("Suivi");
        $apprenant->setArchive(false);
        $apprenant->setProfil($this->getReference(ProfilFixtures::PROFIL_APPRENANT_REFERENCE));
        
        
        $manager->persist($apprenant);
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            ProfilFixtures::class,
        );
    }
}
