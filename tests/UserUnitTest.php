<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();

        $user->setEmail("true@test.com")
            ->setPassword("password")
            ->setAbout("about")
            ->setFirstname("firstname")
            ->setLastname("lastname")
            ->setPhoneNumber("0102030405")
            ->setBehance("behance")
            ->setInstagram("instagram");

        $this->assertTrue($user->getEmail() === "true@test.com");
        $this->assertTrue($user->getPassword() === "password");
        $this->assertTrue($user->getAbout() === "about");
        $this->assertTrue($user->getFirstname() === "firstname");
        $this->assertTrue($user->getLastname() === "lastname");
        $this->assertTrue($user->getPhoneNumber() === "0102030405");
        $this->assertTrue($user->getBehance() === "behance");
        $this->assertTrue($user->getInstagram() === "instagram");
    }

    public function testIsFalse(): void
    {
        $user = new User();

        $user->setEmail("true@test.com")
            ->setPassword("password")
            ->setAbout("about")
            ->setFirstname("firstname")
            ->setLastname("lastname")
            ->setPhoneNumber("0102030405")
            ->setBehance("behance")
            ->setInstagram("instagram");

        $this->assertFalse($user->getEmail() === "false@test.com");
        $this->assertFalse($user->getPassword() === "false");
        $this->assertFalse($user->getAbout() === "false");
        $this->assertFalse($user->getFirstname() === "false");
        $this->assertFalse($user->getLastname() === "false");
        $this->assertFalse($user->getPhoneNumber() === "false");
        $this->assertFalse($user->getBehance() === "false");
        $this->assertFalse($user->getInstagram() === "false");
    }

    public function testIsEmpty(): void
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getAbout());
        $this->assertEmpty($user->getFirstname());
        $this->assertEmpty($user->getLastname());
        $this->assertEmpty($user->getPhoneNumber());
        $this->assertEmpty($user->getBehance());
        $this->assertEmpty($user->getInstagram());
    }
}
