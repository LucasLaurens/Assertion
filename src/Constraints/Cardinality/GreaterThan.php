<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Cardinality;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function is_int;
use function is_float;
use function gettype;

final readonly class GreaterThan extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return (is_int($this->actual) || is_float($this->actual))
            && $this->actual > $this->expected;
    }

    #[Override]
    protected function getFormattedActualValue(): int|float|string
    {
        return (is_int($this->actual) || is_float($this->actual))
            ? $this->actual
            : gettype($this->actual);
    }
}
