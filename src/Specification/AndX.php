<?php

namespace GBProd\Specification;

/**
 * And specification implementation
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
final class AndX extends CompositeSpecification
{
    /**
     * @var Specification
     */
    private $firstPart;
    
    /**
     * @var Specification
     */
    private $secondPart;
    
    /**
     * @param Specification $specification
     */
    public function __construct(Specification $firstPart, Specification $secondPart)
    {
        $this->firstPart  = $firstPart;
        $this->secondPart = $secondPart;
    }
        
    /**
     * {inheritdoc}
     */
    public function isSatisfiedBy($candidate)
    {
        return $this->firstPart->isSatisfiedBy($candidate)
            && $this->secondPart->isSatisfiedBy($candidate)
        ;
    }
    
    /**
     * Get the first part of the condition
     * 
     * @return Specification
     */
    public function getFirstPart()
    {
        return $this->firstPart;
    }
    
    /**
     * Get the second part of the condition
     * 
     * @return Specification
     */
    public function getSecondPart()
    {
        return $this->secondPart;
    }
}