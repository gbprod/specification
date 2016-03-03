<?php

namespace GBProd\Specification;

/**
 * Or specification implementation
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
class OrX extends CompositeSpecification
{
    /**
     * @var Specification
     */
    private $firstWrappedSpecification;
    
    /**
     * @var Specification
     */
    private $secondWrappedSpecification;
    
    /**
     * @param Specification $specification
     */
    public function __construct(Specification $firstSpecification, Specification $secondSpecification)
    {
        $this->firstSpecification = $firstSpecification;
        $this->secondSpecification = $secondSpecification;
    }
        
    /**
     * {inheritdoc}
     */
    public function isSatisfiedBy($candidate)
    {
        return $this->firstSpecification->isSatisfiedBy($candidate)
            || $this->secondSpecification->isSatisfiedBy($candidate)
        ;
    }
}