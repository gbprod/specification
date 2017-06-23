<?php

declare(strict_types=1);

namespace Tests\GBProd\Specification;

use GBProd\Specification\OrX;
use GBProd\Specification\Specification;

/**
 * OrX Specification tests
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class OrXTest extends SpecificationTest
{
    public function testConstruction()
    {
        $firstPart  = $this->createMock(Specification::class);
        $secondPart = $this->createMock(Specification::class);

        $spec = new OrX($firstPart, $secondPart);

        $this->assertEquals($firstPart, $spec->getFirstPart());
        $this->assertEquals($secondPart, $spec->getSecondPart());
    }

    public function testIsSatisfiedByReturnsTrueIfBothAreTrue()
    {
        $candidate = new \stdClass();

        $firstWrappedSpec = $this->createSpecification($candidate, true);
        $secondWrappedSpec = $this->createSpecification($candidate, true);

        $spec = new OrX($firstWrappedSpec, $secondWrappedSpec);

        $this->assertTrue($spec->isSatisfiedBy($candidate));
    }

    public function testIsSatisfiedByReturnsFalseIfBothAreFalse()
    {
        $candidate = new \stdClass();

        $firstWrappedSpec = $this->createSpecification($candidate, false);
        $secondWrappedSpec = $this->createSpecification($candidate, false);

        $spec = new OrX($firstWrappedSpec, $secondWrappedSpec);

        $this->assertFalse($spec->isSatisfiedBy($candidate));
    }

    public function testIsSatisfiedByReturnsTrueIfSecondIsFalse()
    {
        $candidate = new \stdClass();

        $firstWrappedSpec = $this->createSpecification($candidate, true);
        $secondWrappedSpec = $this->createSpecification($candidate, false);

        $spec = new OrX($firstWrappedSpec, $secondWrappedSpec);

        $this->assertTrue($spec->isSatisfiedBy($candidate));
    }

    public function testIsSatisfiedByReturnsFalseIfFirstIsFalse()
    {
        $candidate = new \stdClass();

        $firstWrappedSpec = $this->createSpecification($candidate, false);
        $secondWrappedSpec = $this->createSpecification($candidate, true);

        $spec = new OrX($firstWrappedSpec, $secondWrappedSpec);

        $this->assertTrue($spec->isSatisfiedBy($candidate));
    }
}
