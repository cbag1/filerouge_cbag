<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Admin;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminFixtures extends Fixture implements DependentFixtureInterface
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
        $admin = new admin();
        $admin->setUsername('cbag_admin');
        $pass  =  $this->password->encodePassword($admin, "cbagadmin");
        $admin->setPassword($pass);
        $admin->setPrenom($faker->firstName);
        $admin->setNom($faker->lastName);
        $admin->setTelephone($faker->phoneNumber);
        $admin->setEmail($faker->email);
        $admin->setArchive(false);
        $admin->setProfil($this->getReference(ProfilFixtures::PROFIL_ADMIN_REFERENCE));


        $manager->persist($admin);
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            ProfilFixtures::class,
        );
    }
}
