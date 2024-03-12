<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Cardinality;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function is_int;

final readonly class GreaterThan extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return $this->actual > $this->expected;
    }

    #[Override]
    protected function getFormattedActualValue(): string|int|float
    {
        return is_int($this->actual) ? $this->actual : 0;
    }
}
