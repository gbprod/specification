<?php

namespace Tests\GBProd\Specification;

use GBProd\Specification\Specification;

/**
 * Abstract class for Specification tests
 *
 * @author gbprod <contact@gb-prod.fr>
 */
abstract class SpecificationTest extends \PHPUnit_Framework_TestCase
{
    protected function createSpecification($candidate, $returnValue)
    {
        $spec = $this->createMock(Specification::class);

        $spec
            ->expects($this->any())
            ->method('isSatisfiedBy')
            ->with($candidate)
            ->willReturn($returnValue)
        ;

        return $spec;
    }
}
