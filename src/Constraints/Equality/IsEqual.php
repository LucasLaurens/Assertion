<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Equality;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function is_scalar;
use function gettype;

final readonly class IsEqual extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return $this->actual === $this->expected;
    }

    #[Override]
    protected function getFormattedActualValue(): bool|float|int|string|null
    {
        return is_scalar($this->actual) ? $this->actual : gettype($this->actual);
    }
}
