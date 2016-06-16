TreasureData REST API Wrapper
=============================

[![Build Status](https://travis-ci.org/otobank/treasure-php.svg?branch=master)](https://travis-ci.org/otobank/treasure-php)

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
