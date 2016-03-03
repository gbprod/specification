# [WIP] Specification

Yet another [specification pattern](http://en.wikipedia.org/wiki/Specification_pattern) implementation in PHP.

[![Build Status](https://travis-ci.org/gbprod/specification.svg?branch=master)](https://travis-ci.org/gbprod/specification) [![Coverage Status](https://coveralls.io/repos/github/gbprod/specification/badge.svg?branch=master)](https://coveralls.io/github/gbprod/specification?branch=master) [![Code Climate](https://codeclimate.com/github/gbprod/specification/badges/gpa.svg)](https://codeclimate.com/github/gbprod/specification)

[![Latest Stable Version](https://poser.pugx.org/gbprod/specification/v/stable)](https://packagist.org/packages/gbprod/specification) [![Total Downloads](https://poser.pugx.org/gbprod/specification/downloads)](https://packagist.org/packages/gbprod/specification) [![Latest Unstable Version](https://poser.pugx.org/gbprod/specification/v/unstable)](https://packagist.org/packages/gbprod/specification) [![License](https://poser.pugx.org/gbprod/specification/license)](https://packagist.org/packages/gbprod/specification)

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