<?php

declare(strict_types=1);

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
    public function isSatisfiedBy($candidate): bool;
}
