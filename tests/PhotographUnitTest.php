<?php

namespace App\Tests;

use App\Entity\Category;
use App\Entity\Photograph;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class PhotographUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $photograph = new Photograph();
        $user = new User();
        $category = new Category();
        $datetime = new \DateTime();

        $photograph->setUser($user)
                    ->addCategory($category)
                    ->setDescription("description")
                    ->setSlug("slug")
                    ->setName("name")
                    ->setFile("file")
                    ->setHeight(90)
                    ->setWidth(60)
                    ->setForSale(true)
                    ->setPortfolio(true)
                    ->setPrice(320.00)
                    ->setWasTaken($datetime);

        $this->assertTrue($photograph->getUser() === $user);
        $this->assertContains($category, $photograph->getCategory());
        $this->assertTrue($photograph->getDescription() === "description");
        $this->assertTrue($photograph->getSlug() === "slug");
        $this->assertTrue($photograph->getName() === "name");
        $this->assertTrue($photograph->getFile() === "file");
        $this->assertTrue($photograph->getHeight() === 90);
        $this->assertTrue($photograph->getWidth() === 60);
        $this->assertTrue($photograph->getForSale() === true);
        $this->assertTrue($photograph->getPortfolio() === true);
        $this->assertTrue($photograph->getPrice() == 320.00);
        $this->assertTrue($photograph->getWasTaken() === $datetime);
    }
}
