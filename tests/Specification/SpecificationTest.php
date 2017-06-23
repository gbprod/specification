<?php

declare(strict_types=1);

namespace Tests\GBProd\Specification;

use GBProd\Specification\Specification;
use PHPUnit\Framework\TestCase;

/**
 * Abstract class for Specification tests
 *
 * @author gbprod <contact@gb-prod.fr>
 */
abstract class SpecificationTest extends TestCase
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
