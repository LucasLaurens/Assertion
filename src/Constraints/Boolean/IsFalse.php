<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Boolean;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function is_bool;
use function gettype;

final readonly class IsFalse extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_bool(
            $this->actual
        ) && ! $this->actual;
    }

    #[Override]
    protected function getFormattedExpectedValue(): string
    {
        return "false";
    }

    #[Override]
    protected function getFormattedActualValue(): string
    {
        // Could be true or another type
        return is_bool($this->actual)
            ? var_export(
                $this->actual,
                true
            )
            : gettype($this->actual);
    }
}
