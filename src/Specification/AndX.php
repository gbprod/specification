<?php

namespace GBProd\Specification;

/**
 * And specification implementation
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
class AndX extends CompositeSpecification
{
    /**
     * @var Specification
     */
    private $firstSpecification;
    
    /**
     * @var Specification
     */
    private $secondSpecification;
    
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
            && $this->secondSpecification->isSatisfiedBy($candidate)
        ;
    }
}