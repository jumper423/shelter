<?php

class AnimalTest extends PHPUnit_Framework_TestCase
{
    public function testAnimal()
    {
        $animal = new \jumper423\Animal();
        $this->assertEquals(null, $animal->getAge());
        $this->assertEquals(null, $animal->getNickname());
    }

    public function testCat()
    {
        $cat = new \jumper423\Cat();
        $cat->setAge(12);
        $cat->setNickname('Вася');
        $this->assertEquals(12, $cat->getAge());
        $this->assertEquals('Вася', $cat->getNickname());
    }

    public function testDog()
    {
        $dog = new \jumper423\Dog();
        $dog->setAge(6);
        $dog->setNickname('Дина');
        $this->assertEquals(6, $dog->getAge());
        $this->assertEquals('Дина', $dog->getNickname());
        $dog->setAge(10);
        $dog->setNickname('Василиса');
        $this->assertEquals(6, $dog->getAge());
        $this->assertEquals('Дина', $dog->getNickname());
    }
}