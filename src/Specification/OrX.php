<?php

declare(strict_types=1);

namespace GBProd\Specification;

/**
 * Or specification implementation
 *
 * @author gbprod <contact@gb-prod.fr>
 */
final class OrX extends CompositeSpecification
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
     * @param Specification $firstPart
     * @param Specification $secondPart
     */
    public function __construct(Specification $firstPart, Specification $secondPart)
    {
        $this->firstPart = $firstPart;
        $this->secondPart = $secondPart;
    }

    /**
     * {inheritdoc}
     */
    public function isSatisfiedBy($candidate): bool
    {
        return $this->firstPart->isSatisfiedBy($candidate)
            || $this->secondPart->isSatisfiedBy($candidate)
        ;
    }

    /**
     * Get the first part of the condition
     *
     * @return Specification
     */
    public function getFirstPart(): Specification
    {
        return $this->firstPart;
    }

    /**
     * Get the second part of the condition
     *
     * @return Specification
     */
    public function getSecondPart(): Specification
    {
        return $this->secondPart;
    }
}
