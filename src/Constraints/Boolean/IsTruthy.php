<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Boolean;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;
use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function gettype;
use function var_export;

/** Passes for any PHP truthy value: non-zero numbers, non-empty strings, non-empty arrays, objects. Use IsTrue for strict boolean true. */
final readonly class IsTruthy extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return (bool) $this->actual;
    }

    #[Override]
    protected function fail(): never
    {
        throw new InvalidAssertionException(
            sprintf(
                $this->pattern,
                is_scalar($this->actual) ? var_export($this->actual, true) : gettype($this->actual)
            )
        );
    }
}
