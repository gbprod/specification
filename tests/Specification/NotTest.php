<?php

namespace Tests\GBProd\Specification;

use GBProd\Specification\Not;

/**
 * Not Specification tests
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
class NotTest extends SpecificationTest
{
    public function testConstruction()
    {
        $wrapped = $this->getMock('GBProd\Specification\Specification');
        
        $spec = new Not($wrapped);
        
        $this->assertEquals($wrapped, $spec->getWrappedSpecification());
    }
    
    public function testIsSatisfiedByReturnsFalseIfWrappedIsTrue()
    {
        $candidate = new \stdClass();
        
        $wrappedSpec = $this->createSpecification($candidate, true);
        
        $spec = new Not($wrappedSpec);
        
        $this->assertFalse($spec->isSatisfiedBy($candidate));
    }

    public function testIsSatisfiedByReturnsTrueIfWrappedIsFalse()
    {
        $candidate = new \stdClass();
        
        $wrappedSpec = $this->createSpecification($candidate, false);
        
        $spec = new Not($wrappedSpec);
        
        $this->assertTrue($spec->isSatisfiedBy($candidate));
    }
}