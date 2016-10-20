Приют животных.
=============
[![Build Status](https://travis-ci.org/jumper423/shelter.svg?branch=master)](https://travis-ci.org/jumper423/shelter)

Реализовать набор классов для управления приютом для животных. 
Приют может содержать три типа животных – кошки, собаки, черепахи. 
Для каждого животного при попадании в приют указывается кличка и определяется возраст, в дальнейшем эти данные не меняются, человек, забирающий животное не может все это изменить.

Доступны следующие операции:
- Поместить в приют.
- Посмотреть всех животных определенного типа, сортированных по кличке в алфавитном порядке.
- Передать человеку  животное (определенного типа), находящееся в приюте наибольшее время. 
- Передать человеку животное (без указания типа), находящееся  приюте наибольшее время.

задание расчитано для голого php 5.6 или выше
То есть если хочется в задании использовать что-то из php7 - то можно

Installation
----------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist jumper423/shelter
```

or add

```json
"jumper423/shelter": "*"
```

to the `require` section of your composer.json.

Usage & Documentation
------------
```php
$shelter = \jumper423\Shelter::getInstance();

$cat1 = new \jumper423\Cat();
$shelter->newAnimal($cat1);
$dog1 = new \jumper423\Dog();
$shelter->newAnimal($dog1);
$dog2 = new \jumper423\Dog();;
$shelter->newAnimal($dog2);

$animalsCats = $shelter->viewAnimal(\jumper423\Cat::class);
$animalsDogs = $shelter->viewAnimal(\jumper423\Dog::class);

$people = new \jumper423\People();
$animal1= $shelter->transferAnimal(\jumper423\Cat::class);
$people->newAnimal($animal1);

$animal2 = $shelter->transferAnimal();
$people->newAnimal($animal2);
```

## Tests
```
vendor/bin/phpunit 
```