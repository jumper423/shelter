Приют животных.
=============
[![Build Status](https://travis-ci.org/jumper423/file-iterator.svg?branch=master)](https://travis-ci.org/jumper423/file-iterator)

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
php composer.phar require --prefer-dist jumper423/file-iterator
```

or add

```json
"jumper423/yfile-iterator": "*"
```

to the `require` section of your composer.json.

Usage & Documentation
------------
```php
$fileIterator = new \jumper423\FileIterator(__DIR__ . '/file');
$fileIterator->rewind();
$fileIterator->next();
$fileIterator->next();
$fileIterator->seek(3);
$fileIterator->next();
echo $fileIterator->current();
$fileIterator->next();
echo $fileIterator->current();
$fileIterator->seek(9);
$fileIterator->next();
$fileIterator->next();
if ($fileIterator->valid()) {
    ...
}
```

## Tests
```
vendor/bin/phpunit 
```