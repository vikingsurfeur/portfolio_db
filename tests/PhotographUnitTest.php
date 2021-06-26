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

    public function testIsFalse(): void
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

        $this->assertFalse($photograph->getUser() === new User());
        $this->assertNotContains(new Category(), $photograph->getCategory());
        $this->assertFalse($photograph->getDescription() === "false");
        $this->assertFalse($photograph->getSlug() === "false");
        $this->assertFalse($photograph->getName() === "false");
        $this->assertFalse($photograph->getFile() === "false");
        $this->assertFalse($photograph->getHeight() === 80);
        $this->assertFalse($photograph->getWidth() === 50);
        $this->assertFalse($photograph->getForSale() === false);
        $this->assertFalse($photograph->getPortfolio() === false);
        $this->assertFalse($photograph->getPrice() == false);
        $this->assertFalse($photograph->getWasTaken() === new \DateTime());
    }

    public function testIsEmpty()
    {
        $photograph = new Photograph();

        $this->assertEmpty($photograph->getUser());
        $this->assertEmpty( $photograph->getCategory());
        $this->assertEmpty($photograph->getDescription());
        $this->assertEmpty($photograph->getSlug());
        $this->assertEmpty($photograph->getName());
        $this->assertEmpty($photograph->getFile());
        $this->assertEmpty($photograph->getHeight());
        $this->assertEmpty($photograph->getWidth());
        $this->assertEmpty($photograph->getForSale());
        $this->assertEmpty($photograph->getPortfolio());
        $this->assertEmpty($photograph->getPrice());
        $this->assertEmpty($photograph->getWasTaken());
    }
}