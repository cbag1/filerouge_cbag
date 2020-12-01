<?php

namespace App\DataFixtures;

use App\Entity\Formateur;
use App\Entity\Profil;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ProfilFixtures extends Fixture
{

    private $password;
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->password = $encoder;
    }

    public const PROFIL_ADMIN_REFERENCE= "admin";
    public const PROFIL_CM_REFERENCE= "cm";
    public const PROFIL_FORMATEUR_REFERENCE= "formateur";
    public const PROFIL_APPRENANT_REFERENCE= "apprenant";
    public const PROFIL_TEST_REFERENCE= "test";

    public function load(ObjectManager $manager)
    {

        // $product = new Product();
        // $manager->persist($product);
        $profiladmin=new Profil();
        $profiladmin->setLibelle("Admin");
        $profiladmin->setArchive(false);

        // Pour le formateur
        $profilformateur=new Profil();
        $profilformateur->setLibelle("Formateur");
        $profilformateur->setArchive(false);


        // Pour l'Apprenant
        $profilappr=new Profil();
        $profilappr->setLibelle("Apprenant");
        $profilappr->setArchive(false);

        
        //Pour le CM
        $profilCM=new Profil();
        $profilCM->setLibelle("CM");
        $profilCM->setArchive(false);

        $manager->persist($profiladmin);
        $manager->persist($profilCM);
        $manager->persist($profilformateur);
        $manager->persist($profilappr);
        $manager->persist($profilappr);
        
        $manager->flush();

        $this->addReference(self::PROFIL_ADMIN_REFERENCE,$profiladmin);
        $this->addReference(self::PROFIL_APPRENANT_REFERENCE,$profilappr);
        $this->addReference(self::PROFIL_CM_REFERENCE,$profilCM);
        $this->addReference(self::PROFIL_FORMATEUR_REFERENCE,$profilformateur);
        
    }
}
