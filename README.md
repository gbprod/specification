# [WIP] Specification

Yet another [specification pattern](http://en.wikipedia.org/wiki/Specification_pattern) implementation in PHP.

[![Build Status](https://travis-ci.org/gbprod/specification.svg?branch=master)](https://travis-ci.org/gbprod/specification)

[![Code Climate](https://codeclimate.com/github/gbprod/specification/badges/gpa.svg)](https://codeclimate.com/github/gbprod/specification)

## Usage

### Create a Specification

```php
<?php

use GBProd\Specification\CompositeSpecification;

class PriceGreaterThan extends CompositeSpecification
{
    private $threshold;
    
    public function __construct($threshold)
    {
        $this->threshold = $threshold;
    }
    
    public function isSatisfiedBy($product)
    {
        return $product->getPrice() > $this->threshold;
    }
}
```

### Compose your specifications

```php
$expensive = new PriceGreaterThan(1000);
$available = new IsAvailable();
$hightStock = new StockGreaterThan(4);


$lowStockExpensiveProduct = $expensive
    ->andX($available)
    ->andX($hightStock->not())
;
```

### Use it !

```php
foreach($products as $product) {
    if ($lowStockExpensiveProduct->isSatisfiedBy($product)) {
        $this->makeSomethingAwesome($product);
    }
}
```

## Requirements

 * PHP 5.5+

## Installation

### Using composer

```bash
composer require gbprod/specification
```