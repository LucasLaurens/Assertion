<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Numeric;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;
use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function is_int;
use function is_float;
use function gettype;
use function var_export;

final readonly class IsZero extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return (is_int($this->actual) || is_float($this->actual))
            && ($this->actual === 0 || $this->actual === 0.0);
    }

    #[Override]
    protected function fail(): never
    {
        throw new InvalidAssertionException(
            sprintf(
                $this->pattern,
                (is_int($this->actual) || is_float($this->actual))
                    ? var_export($this->actual, true)
                    : gettype($this->actual)
            )
        );
    }
}
