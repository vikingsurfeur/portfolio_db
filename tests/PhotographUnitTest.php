<?php

namespace App\Tests;

use App\Entity\Photograph;
use PHPUnit\Framework\TestCase;

class PhotographUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $photograph = new Photograph();
        $datetime = new \DateTime();

        $photograph->setUser
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


        $this->assertTrue($category->getDescription() === "description");
        $this->assertTrue($category->getName() === "name");
        $this->assertTrue($category->getSlug() === "slug");
    }

    public function testIsFalse(): void
    {
        $category = new Category();

        $category->setDescription("description")
            ->setName("name")
            ->setSlug("slug");


        $this->assertFalse($category->getDescription() === "false");
        $this->assertFalse($category->getName() === "false");
        $this->assertFalse($category->getSlug() === "false");
    }

    public function testIsEmpty(): void
    {
        $category = new Category();

        $this->assertEmpty($category->getDescription());
        $this->assertEmpty($category->getName());
        $this->assertEmpty($category->getSlug());
    }
}
