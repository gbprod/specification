<?php

namespace GBProd\Specification;

/**
 * Not specification implementation
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
final class Not extends CompositeSpecification
{
    /**
     * @var Specification
     */
    private $wrappedSpecification;
    
    /**
     * @param Specification $specification
     */
    public function __construct(Specification $specification)
    {
        $this->wrappedSpecification = $specification;
    }
        
    /**
     * {inheritdoc}
     */
    public function isSatisfiedBy($candidate)
    {
        return !$this->wrappedSpecification->isSatisfiedBy($candidate);
    }
    
    /**
     * Get the wrapped specification
     * 
     * @return Specification
     */
    public function getWrappedSpecification()
    {
       return $this->wrappedSpecification; 
    }
}