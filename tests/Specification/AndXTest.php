<?php

namespace Tests\GBProd\Specification;

use GBProd\Specification\AndX;
use GBProd\Specification\Specification;

/**
 * AndX Specification tests
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class AndXTest extends SpecificationTest
{
    public function testConstruction()
    {
        $firstPart  = $this->createMock(Specification::class);
        $secondPart = $this->createMock(Specification::class);

        $spec = new AndX($firstPart, $secondPart);

        $this->assertEquals($firstPart, $spec->getFirstPart());
        $this->assertEquals($secondPart, $spec->getSecondPart());
    }

    public function testIsSatisfiedByReturnsTrueIfBothAreTrue()
    {
        $candidate = new \stdClass();

        $firstWrappedSpec = $this->createSpecification($candidate, true);
        $secondWrappedSpec = $this->createSpecification($candidate, true);

        $spec = new AndX($firstWrappedSpec, $secondWrappedSpec);

        $this->assertTrue($spec->isSatisfiedBy($candidate));
    }

    public function testIsSatisfiedByReturnsFalseIfBothAreFalse()
    {
        $candidate = new \stdClass();

        $firstWrappedSpec = $this->createSpecification($candidate, false);
        $secondWrappedSpec = $this->createSpecification($candidate, false);

        $spec = new AndX($firstWrappedSpec, $secondWrappedSpec);

        $this->assertFalse($spec->isSatisfiedBy($candidate));
    }

    public function testIsSatisfiedByReturnsFalseIfSecondIsFalse()
    {
        $candidate = new \stdClass();

        $firstWrappedSpec = $this->createSpecification($candidate, true);
        $secondWrappedSpec = $this->createSpecification($candidate, false);

        $spec = new AndX($firstWrappedSpec, $secondWrappedSpec);

        $this->assertFalse($spec->isSatisfiedBy($candidate));
    }

    public function testIsSatisfiedByReturnsFalseIfFirstIsFalse()
    {
        $candidate = new \stdClass();

        $firstWrappedSpec = $this->createSpecification($candidate, false);
        $secondWrappedSpec = $this->createSpecification($candidate, true);

        $spec = new AndX($firstWrappedSpec, $secondWrappedSpec);

        $this->assertFalse($spec->isSatisfiedBy($candidate));
    }
}
