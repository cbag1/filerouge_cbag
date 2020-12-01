<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Formateur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class FormateurFixtures extends Fixture implements DependentFixtureInterface
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
        $formateur = new Formateur();
        $formateur->setUsername('cbag_formateur');
        $pass  =  $this->password->encodePassword($formateur, "cbagformateur");
        $formateur->setPassword($pass);
        $formateur->setPrenom($faker->firstName);
        $formateur->setNom($faker->lastName);
        $formateur->setTelephone($faker->phoneNumber);
        $formateur->setEmail($faker->email);
        $formateur->setArchive(false);
        $formateur->setProfil($this->getReference(ProfilFixtures::PROFIL_FORMATEUR_REFERENCE));


        $manager->persist($formateur);
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            ProfilFixtures::class,
        );
    }
}
