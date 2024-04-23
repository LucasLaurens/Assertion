<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Boolean;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function is_bool;
use function gettype;

final readonly class IsTrue extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_bool(
            $this->actual
        ) && $this->actual;
    }

    #[Override]
    protected function getFormattedExpectedValue(): bool|float|int|string|null
    {
        return "true";
    }

    #[Override]
    protected function getFormattedActualValue(): bool|float|int|string|null
    {
        // Could be false or another type
        return is_bool($this->actual)
            ? var_export(
                $this->actual,
                true
            )
            : gettype($this->actual);
    }
}
