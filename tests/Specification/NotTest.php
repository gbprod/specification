<?php

namespace Tests\GBProd\Specification;

use GBProd\Specification\Not;

/**
 * Not Specification tests
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
class NotTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruction()
    {
        $spec = new Not(
            $this->getMock('GBProd\Specification\Specification')
        );
    }
    
    public function testIsSatisfiedByReturnsFalseIfWrappedIsTrue()
    {
        $candidate = new \stdClass();
        
        $wrappedSpec = $this->createWrappedSpecification($candidate, true);
        
        $spec = new Not($wrappedSpec);
        
        $this->assertFalse($spec->isSatisfiedBy($candidate));
    }
    
    private function createWrappedSpecification($candidate, $value)
    {
        $wrappedSpec = $this->getMock('GBProd\Specification\Specification');

        $wrappedSpec
            ->expects($this->any())
            ->method('isSatisfiedBy')
            ->with($candidate)
            ->willReturn($value)
        ;

        return $wrappedSpec;
    }
    
    public function testIsSatisfiedByReturnsTrueIfWrappedIsFalse()
    {
        $candidate = new \stdClass();
        
        $wrappedSpec = $this->createWrappedSpecification($candidate, false);
        
        $spec = new Not($wrappedSpec);
        
        $this->assertTrue($spec->isSatisfiedBy($candidate));
    }
}