<?php

namespace GBProd\Specification;

/**
 * Specification interface
 * 
 * @author gbprod <contact@gb-prod.fr>
 */
interface Specification
{
    /**
     * Tells if the candidate object matches criterias
     * 
     * @param mixed $candidate
     * 
     * @return boolean
     */
    public function isSatisfiedBy($value);
}