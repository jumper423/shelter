<?php

namespace jumper423;

class Shelter
{
    private static $instance = null;

    /**
     * @return Shelter
     */
    public static function getInstance() : Shelter
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    private function __clone(){}
    private function __construct(){}

    /**
     * @var Animal[]
     */
    private $animals = [];

    /**
     * @param Animal $animal
     */
    public function newAnimal(Animal $animal)
    {
        $animal->setAge(rand(1, 12));
        $animal->setNickname(substr(md5(rand(1, 1000) . time()), 0, 10));
        $this->animals[] = $animal;
    }

    /**
     * @param Animal $type
     * @return Animal[]
     */
    public function viewAnimal(Animal $type)
    {
        $animals = array_filter($this->animals, function (Animal $animal) use ($type) {
            return $animal instanceof $type;
        });
        uasort($animals, function (Animal $animal1, Animal $animal2) {
            return $animal1->getNickname() <=> $animal2->getNickname();
        });
        return $animals;
    }
}