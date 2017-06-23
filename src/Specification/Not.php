<?php

declare(strict_types=1);

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
    public function isSatisfiedBy($candidate): bool
    {
        return !$this->wrappedSpecification->isSatisfiedBy($candidate);
    }

    /**
     * Get the wrapped specification
     *
     * @return Specification
     */
    public function getWrappedSpecification(): Specification
    {
        return $this->wrappedSpecification;
    }
}
