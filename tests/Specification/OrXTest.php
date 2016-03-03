<?php

namespace Tests\GBProd\Specification;

use GBProd\Specification\OrX;

/**
 * OrX Specification tests
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
class OrXTest extends SpecificationTest
{
    public function testConstruction()
    {
        $spec = new OrX(
            $this->getMock('GBProd\Specification\Specification'),
            $this->getMock('GBProd\Specification\Specification')
        );
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