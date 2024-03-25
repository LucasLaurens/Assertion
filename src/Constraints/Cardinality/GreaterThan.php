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
    protected function getFormattedActualValue(): bool|float|int|string|null
    {
        // The default value is 0 when it is not an integer
        return is_int($this->actual) ? $this->actual : 0;
    }
}
