<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Blogpost;
use App\Entity\Category;
use App\Entity\Photograph;
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

        // Création de 5 catégories
        for ($i = 0; $i < 5; $i++) {
            $category = new Category();

            $category->setName($faker->sentence(3))
                     ->setSlug($faker->slug(3))
                     ->setDescription($faker->text(350));
            
            $manager->persist($category);

            // Création de 2 Photographies
            for ($i = 0; $i < 2; $i++) {
                $photograph = new Photograph();

                $photograph->setName($faker->sentence(3))
                        ->setSlug($faker->slug(3))
                        ->setDescription($faker->text(350))
                        ->setWidth(rand(100, 1000))
                        ->setHeight(rand(100, 1000))
                        ->setForSale($faker->randomElement([true, false]))
                        ->setPrice(rand(0, 1000))
                        ->setWasTaken($faker->dateTimeBetween('-1 years', 'now'))
                        ->setPortfolio($faker->randomElement([true, false]))
                        ->setFile('./img/placeholder.jpg')
                        ->addCategory($category)
                        ->setUser($user);

                $manager->persist($photograph);
            }
        }

        $manager->flush();
    }
}
