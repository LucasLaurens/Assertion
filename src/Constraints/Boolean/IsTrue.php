<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Boolean;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function is_bool;
use function gettype;

/** Passes only for the strict boolean true. Rejects 1, "1", non-empty strings — use IsTruthy for those. */
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
    protected function getFormattedExpectedValue(): string
    {
        return "true";
    }

    #[Override]
    protected function getFormattedActualValue(): string
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
