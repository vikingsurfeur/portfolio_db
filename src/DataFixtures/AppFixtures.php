<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\PasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $encoder;
    
    public function __construct(PasswordHasherInterface $encoder)
    {
        $this->hash = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // Utilisation de Faker
        $faker = Factory::create('fr_FR');

        // Création d'un utilisateur
        $user = new User();

        $user->setEmail('user@example.com')
             ->setFirstname($faker->firstName())
             ->setLastname($faker->lastName())
             ->setPhoneNumber($faker->phoneNumber())
             ->setAbout($faker->text())
             ->setBehance('behance')
             ->setInstagram('instagram');

        // Hashage du mot de passe
        $user->setPassword($this->hash->encodePassword($user, 'password'));

        $manager->persist($user);
        $manager->flush();
    }
}
