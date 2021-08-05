<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Blogpost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordHasher;
    
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
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
        $user->setPassword($this->passwordHasher->hashPassword($user, 'the_new_password'));

        $manager->persist($user);

        // Création de 10 Blogposts
        for ($i = 0; $i < 10; $i++) {
            $blogpost = new Blogpost();

            $blogpost->setTitle($faker->sentence(3))
                     ->setContent($faker->text(350))
                     ->setSlug($faker->slug(3))
                     ->setDate($faker->dateTimeBetween('-1 years', 'now'))
                     ->setUser($user);
            
            $manager->persist($blogpost);
        }

        $manager->flush();
    }
}
