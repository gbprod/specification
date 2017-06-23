<?php

namespace Tests\GBProd\Specification;

use GBProd\Specification\AndX;
use GBProd\Specification\CompositeSpecification;
use GBProd\Specification\Not;
use GBProd\Specification\OrX;

/**
 * CompositeSpecification Specification tests
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class CompositeSpecificationTest extends SpecificationTest
{
    public function testAndXCreatesAnAndXSpecification()
    {
        $candidate = new \stdClass();

        $spec = $this->getMockForAbstractClass(CompositeSpecification::class);

        $wrappedSpec = $this->createSpecification($candidate, false);

        $createdSpec = $spec->andX($wrappedSpec);

        $this->assertInstanceOf(AndX::class, $createdSpec);
    }

    public function testAndXCreatedSpecification()
    {
        $candidate = new \stdClass();

        $spec = $this->getMockForAbstractClass(CompositeSpecification::class);

        $spec
            ->expects($this->any())
            ->method('isSatisfiedBy')
            ->willReturn(true)
        ;

        $wrappedSpec = $this->createSpecification($candidate, false);

        $createdSpec = $spec->andX($wrappedSpec);

        $this->assertFalse(
            $createdSpec->isSatisfiedBy($candidate)
        );
    }

    public function testOrXCreatesAnAndXSpecification()
    {
        $candidate = new \stdClass();

        $spec = $this->getMockForAbstractClass(CompositeSpecification::class);

        $wrappedSpec = $this->createSpecification($candidate, false);

        $createdSpec = $spec->orX($wrappedSpec);

        $this->assertInstanceOf(OrX::class, $createdSpec);
    }

    public function testOrXCreatedSpecification()
    {
        $candidate = new \stdClass();

        $spec = $this->getMockForAbstractClass(CompositeSpecification::class);

        $spec
            ->expects($this->any())
            ->method('isSatisfiedBy')
            ->willReturn(true)
        ;

        $wrappedSpec = $this->createSpecification($candidate, false);

        $createdSpec = $spec->orX($wrappedSpec);

        $this->assertTrue(
            $createdSpec->isSatisfiedBy($candidate)
        );
    }


    public function testNotCreatesANotSpecification()
    {
        $candidate = new \stdClass();

        $spec = $this->getMockForAbstractClass(CompositeSpecification::class);

        $wrappedSpec = $this->createSpecification($candidate, false);

        $createdSpec = $spec->not($wrappedSpec);

        $this->assertInstanceOf(Not::class, $createdSpec);
    }

    public function testNotCreatedSpecification()
    {
        $candidate = new \stdClass();

        $spec = $this->getMockForAbstractClass(CompositeSpecification::class);

        $spec
            ->expects($this->any())
            ->method('isSatisfiedBy')
            ->willReturn(true)
        ;

        $createdSpec = $spec->not();

        $this->assertFalse(
            $createdSpec->isSatisfiedBy($candidate)
        );
    }
}
