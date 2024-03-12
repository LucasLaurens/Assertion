<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Equality;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

final readonly class IsEqual extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return $this->actual === $this->expected;
    }

    #[Override]
    protected function getFormattedActualValue(): string|int|float
    {
        return is_int($this->actual) ? $this->actual : 0;
    }
}
