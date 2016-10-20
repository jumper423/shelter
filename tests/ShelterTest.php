<?php

class FileTest extends PHPUnit_Framework_TestCase
{
    public function testInstance()
    {
        $instance = \jumper423\Shelter::getInstance();
        return $instance;
    }

    /**
     * @param $instance \jumper423\Shelter
     * @depends testInstance
     */
    public function testNewAnimal($instance)
    {
        $cat1 = new \jumper423\Cat();
        $instance->newAnimal($cat1);
        $this->assertAttributeEquals([$cat1], 'animals', $instance);

        $dog1 = new \jumper423\Dog();
        $instance->newAnimal($dog1);
        $dog2 = new \jumper423\Dog();;
        $instance->newAnimal($dog2);
        $this->assertAttributeEquals([$cat1, $dog1, $dog2], 'animals', $instance);
    }

    public function testInstance2()
    {
        $instance = \jumper423\Shelter::getInstance();
        $instance->killAnimals();

        $cat1 = new \jumper423\Cat();
        $cat1->setNickname('Кошка2');
        $cat1->setAge(5);
        $instance->newAnimal($cat1);

        $dog1 = new \jumper423\Dog();
        $dog1->setNickname('Собака1');
        $dog1->setAge(6);
        $instance->newAnimal($dog1);

        $cat2 = new \jumper423\Cat();
        $cat2->setNickname('Кошка1');
        $cat2->setAge(12);
        $instance->newAnimal($cat2);
        return $instance;
    }

    /**
     * @param $instance \jumper423\Shelter
     * @depends testInstance2
     */
    public function testViewAnimal($instance)
    {
        $animals = $instance->viewAnimal(\jumper423\Cat::class);
        $this->assertEquals('Кошка1', $animals[0]->getNickname());
        $this->assertEquals('Кошка2', $animals[1]->getNickname());
        $this->assertInstanceOf(\jumper423\Cat::class, $animals[0]);
        $this->assertInstanceOf(\jumper423\Cat::class, $animals[1]);
        $animals = $instance->viewAnimal(\jumper423\Dog::class);
        $this->assertCount(1, $animals);
        $this->assertInstanceOf(\jumper423\Dog::class, $animals[0]);
    }

    /**
     * @param $instance \jumper423\Shelter
     * @depends testInstance2
     */
    public function testTransferAnimal($instance)
    {
        $people = new \jumper423\People();
        $animal1= $instance->transferAnimal(\jumper423\Cat::class);
        $this->assertEquals('Кошка2', $animal1->getNickname());
        $people->newAnimal($animal1);
        $this->assertAttributeEquals([$animal1], 'animals', $people);

        $animal2 = $instance->transferAnimal();
        $this->assertEquals('Собака1', $animal2->getNickname());
        $people->newAnimal($animal2);
        $this->assertAttributeEquals([$animal1, $animal2], 'animals', $people);
    }
}