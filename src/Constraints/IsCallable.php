<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints;

use Override;

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function is_callable;

final readonly class IsCallable extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_callable($this->actual);
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
