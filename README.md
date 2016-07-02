TreasureData REST API Wrapper
=============================

[![Build Status](https://travis-ci.org/otobank/treasure-php.svg?branch=master)](https://travis-ci.org/otobank/treasure-php)
[![Latest Stable Version](https://poser.pugx.org/otobank/treasure/v/stable)](https://packagist.org/packages/otobank/treasure)
[![Total Downloads](https://poser.pugx.org/otobank/treasure/downloads)](https://packagist.org/packages/otobank/treasure)
[![Latest Unstable Version](https://poser.pugx.org/otobank/treasure/v/unstable)](https://packagist.org/packages/otobank/treasure)
[![License](https://poser.pugx.org/otobank/treasure/license)](https://packagist.org/packages/otobank/treasure)

Installation
------------

```sh
composer require otobank/treasure
```


Usage
-----

```php
<?php

require __DIR__.'/vendor/autoload.php';

use Otobank\Treasure\Treasure;

$treasure = new Treasure([
    'host' => 'in.treasuredata.com',
    'writeKey' => 'YOUR_WRITE_ONLY_APIKEY_IS_HERE',
    'database' => 'DATABASE_NAME',
]);

$treasure->addRecord([
    'itemId' => 101,
    'saleId' => 10,
    'userId' => 1,
]);
```
