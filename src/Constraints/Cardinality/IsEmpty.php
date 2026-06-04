<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Cardinality;

use Override;
use Countable;
use EmptyIterator;
use LucasLaurens\Assertion\Constraints\Constraint;
use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

final readonly class IsEmpty extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        if ($this->actual instanceof EmptyIterator) {
            return true;
        }

        if ($this->actual instanceof Countable) {
            return count($this->actual) === 0;
        }

        return empty($this->actual);
    }

    /**
     * @throws InvalidAssertionException
     */
    #[Override]
    protected function fail(): never
    {
        throw new InvalidAssertionException(
            sprintf(
                $this->pattern,
                $this->getFormattedActualValue()
            )
        );
    }
}
