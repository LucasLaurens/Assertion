<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Numeric;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function is_int;
use function is_float;
use function is_numeric;

final readonly class IsGreaterThanOrEqualTo extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return (is_int($this->actual) || is_float($this->actual))
            && is_numeric($this->expected)
            && $this->actual >= $this->expected;
    }

    #[Override]
    protected function getFormattedActualValue(): int|float
    {
        return (is_int($this->actual) || is_float($this->actual))
            ? $this->actual
            : 0;
    }
}
