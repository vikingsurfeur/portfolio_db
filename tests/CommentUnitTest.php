<?php

namespace App\Tests;

use App\Entity\Blogpost;
use App\Entity\Comment;
use App\Entity\Photograph;
use PHPUnit\Framework\TestCase;

class CommentUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $comment = new Comment();
        $photograph = new Photograph();
        $datetime = new \DateTime();
        $blogpost = new Blogpost();

        $comment->setContent("content")
                ->setDate($datetime)
                ->setEmail("email")
                ->setAuthor("author")
                ->setBlogpost($blogpost)
                ->setPhotograph($photograph);


        $this->assertTrue($comment->getContent() === "content");
        $this->assertTrue($comment->getDate() === $datetime);
        $this->assertTrue($comment->getEmail() === "email");
        $this->assertTrue($comment->getAuthor() === "author");
        $this->assertTrue($comment->getBlogpost() === $blogpost);
        $this->assertTrue($comment->getPhotograph() === $photograph);
    }

    public function testIsFalse(): void
    {
        $comment = new Comment();
        $photograph = new Photograph();
        $datetime = new \DateTime();
        $blogpost = new Blogpost();

        $comment->setContent("content")
            ->setDate($datetime)
            ->setEmail("email")
            ->setAuthor("author")
            ->setBlogpost($blogpost)
            ->setPhotograph($photograph);


        $this->assertFalse($comment->getContent() === "false");
        $this->assertFalse($comment->getDate() === new \DateTime());
        $this->assertFalse($comment->getEmail() === "false");
        $this->assertFalse($comment->getAuthor() === "false");
        $this->assertFalse($comment->getBlogpost() === new Blogpost());
        $this->assertFalse($comment->getPhotograph() === new Photograph());
    }

    public function testIsEmpty()
    {
        $comment = new Comment();

        $this->assertEmpty($comment->getContent());
        $this->assertEmpty($comment->getDate());
        $this->assertEmpty($comment->getEmail());
        $this->assertEmpty($comment->getAuthor());
        $this->assertEmpty($comment->getBlogpost());
        $this->assertEmpty($comment->getPhotograph());
    }
}

