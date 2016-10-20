<?php

namespace jumper423;

/**
 * Class Animal
 * @package jumper423
 */
class Animal
{
    /** @var string */
    private $nickname = null;
    /** @var integer */
    private $age = null;

    /**
     * @return string
     */
    public function getNickname() : string {
        return $this->nickname;
    }

    /**
     * @return int
     */
    public function getAge() : int {
        return $this->age;
    }

    /**
     * @param string $nickname
     */
    public function setNickname(string $nickname) {
        if (is_null($this->nickname)) {
            $this->nickname = $nickname;
        }
    }

    /**
     * @param int $age
     */
    public function setAge(int $age) {
        if (is_null($this->age)) {
            $this->age = $age;
        }
    }
}
