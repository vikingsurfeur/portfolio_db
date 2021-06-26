<?php

namespace App\Tests;

use App\Entity\Blogpost;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class BlogpostUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $blogpost = new Blogpost();
        $user = new User();
        $datetime = new \DateTime();

        $blogpost->setSlug("slug")
                ->setUser($user)
                ->setDate($datetime)
                ->setContent("content")
                ->setTitle("title");


        $this->assertTrue($blogpost->getSlug() === "slug");
        $this->assertTrue($blogpost->getUser() === $user);
        $this->assertTrue($blogpost->getDate() === $datetime);
        $this->assertTrue($blogpost->getTitle() === "title");
        $this->assertTrue($blogpost->getContent() === "content");
    }

    public function testIsFalse(): void
    {
        $blogpost = new Blogpost();
        $user = new User();
        $datetime = new \DateTime();

        $blogpost->setSlug("slug")
            ->setUser($user)
            ->setDate($datetime)
            ->setContent("content")
            ->setTitle("title");


        $this->assertFalse($blogpost->getSlug() === "false");
        $this->assertFalse($blogpost->getUser() === new User());
        $this->assertFalse($blogpost->getDate() === new \DateTime());
        $this->assertFalse($blogpost->getTitle() === "false");
        $this->assertFalse($blogpost->getContent() === "false");
    }

    public function testIsEmpty(): void
    {
        $blogpost = new Blogpost();

        $this->assertEmpty($blogpost->getSlug());
        $this->assertEmpty($blogpost->getUser());
        $this->assertEmpty($blogpost->getDate());
        $this->assertEmpty($blogpost->getTitle());
        $this->assertEmpty($blogpost->getContent());
    }
}
