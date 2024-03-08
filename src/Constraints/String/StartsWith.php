<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\String;

use LucasLaurens\Assertion\Constraints\Constraint;

final readonly class StartsWith extends Constraint
{
    protected function isMatching(): bool
    {
        return is_string($this->expected)
            && is_string($this->actual)
            && str_starts_with(
                $this->actual,
                $this->expected
            );
    }

    protected function getFormattedActualValue(): string|int|float
    {
        return is_string($this->actual)
            ? $this->actual
            : get_debug_type($this->actual);
    }
}
