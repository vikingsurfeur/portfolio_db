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

            $blogpost->setTitle($faker->title())
                     ->setContent($faker->text(150))
                     ->setSlug($faker->slug(3))
                     ->setDate($faker->dateTimeBetween('-6 month', 'now'))
                     ->setUser($user);
            
            $manager->persist($blogpost);
        }

        // Création de 5 catégories
        for ($k = 0; $k < 5; $k++) {
            $category = new Category();

            $category->setName($faker->word())
                     ->setSlug($faker->slug(3))
                     ->setDescription($faker->text(10));
            
            $manager->persist($category);

            // Création de 2 Photographies
            for ($j = 0; $j < 2; $j++) {
                $photograph = new Photograph();

                $photograph->setName($faker->title())
                        ->setSlug($faker->slug())
                        ->setDescription($faker->text())
                        ->setWidth($faker->randomFloat(2, 20, 60))
                        ->setHeight($faker->randomFloat(2, 20, 60))
                        ->setForSale($faker->randomElement([true, false]))
                        ->setPrice($faker->randomFloat(2, 60, 6000))
                        ->setWasTaken($faker->dateTimeBetween('-6 month', 'now'))
                        ->setDate($faker->dateTimeBetween('-6 month', 'now'))
                        ->setPortfolio($faker->randomElement([true, false]))
                        ->setFile('/img/david_bouscarle_portfolio_1.jpg')
                        ->addCategory($category)
                        ->setUser($user);

                $manager->persist($photograph);
            }
        }

        $manager->flush();
    }
}
