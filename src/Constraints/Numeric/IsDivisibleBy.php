<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Numeric;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;
use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function is_int;
use function is_float;
use function is_numeric;
use function fmod;
use function var_export;
use function gettype;

final readonly class IsDivisibleBy extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        if (!is_int($this->actual) && !is_float($this->actual)) {
            return false;
        }

        if (! is_numeric($this->expected) || $this->expected === 0) {
            return false;
        }

        return fmod((float) $this->actual, (float) $this->expected) === 0.0;
    }

    #[Override]
    protected function fail(): never
    {
        throw new InvalidAssertionException(
            sprintf(
                $this->pattern,
                is_numeric($this->expected) ? var_export($this->expected, true) : gettype($this->expected),
                (is_int($this->actual) || is_float($this->actual))
                    ? var_export($this->actual, true)
                    : gettype($this->actual)
            )
        );
    }
}
