<?php

namespace App\DataFixtures;

use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
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
        
        
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ProfilFixtures::class,
        );
    }
}
