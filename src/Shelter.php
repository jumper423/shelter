<?php

namespace jumper423;

/**
 * Class Shelter
 * @package jumper423
 */
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
     * @param string $type
     * @return Animal[]
     */
    public function viewAnimal(string $type)
    {
        $animals = array_filter($this->animals, function (Animal $animal) use ($type) {
            return $animal instanceof $type;
        });
        usort($animals, function (Animal $animal1, Animal $animal2) {
            return $animal1->getNickname() <=> $animal2->getNickname();
        });
        return $animals;
    }

    /**
     * @param null $type
     * @return Animal|false
     */
    public function transferAnimal($type = null) {
        if (is_null($type)) {
            return array_shift($this->animals);
        } else {
            foreach ($this->animals as $key => &$animal) {
                if ($animal instanceof $type) {
                    $animalResult = $animal;
                    unset($this->animals[$key]);
                    return $animalResult;
                }
            }
        }
        return false;
    }

    public function killAnimals(){
        $this->animals = [];
    }
}