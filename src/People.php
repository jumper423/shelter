<?php

namespace jumper423;

/**
 * Class People
 * @package jumper423
 */
class People
{
    /** @var Animal[] */
    private $animals = [];

    /**
     * @param Animal $animal
     */
    public function newAnimal(Animal $animal){
        $this->animals[] = $animal;
    }
}