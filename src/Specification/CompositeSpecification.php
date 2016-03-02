<?php

namespace GBProd\Specification;

/**
 * Abstract composite specification implementation
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
abstract class CompositeSpecification implements Specification
{
    /**
     * Chain with AndX specification
     * 
     * @param Specification $specification
     *
     * @return AndX
     */
    public function andX(Specification $specification)
    {
        
    }
    
    /**
     * Chain with OrX specification
     * 
     * @param Specification $specification
     *
     * @return OrX
     */
    public function orX(Specification $specification)
    {
        
    }
    
    /**
     * Chain with Not specification
     *
     * @return Not
     */
    public function not(Specification $specification)
    {
        
    }
}