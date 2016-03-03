<?php

namespace Tests\GBProd\Specification;

/**
 * Abstract class for Specification tests
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
abstract class SpecificationTest extends \PHPUnit_Framework_TestCase
{
    protected function createSpecification($candidate, $returnValue)
    {
        $spec = $this->getMock('GBProd\Specification\Specification');

        $spec
            ->expects($this->any())
            ->method('isSatisfiedBy')
            ->with($candidate)
            ->willReturn($returnValue)
        ;

        return $spec;
    }
}