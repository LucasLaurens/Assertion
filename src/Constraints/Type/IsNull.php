<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Type;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function is_null;
use function gettype;

final readonly class IsNull extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return null === $this->actual;
    }

    #[Override]
    protected function getFormattedExpectedValue(): bool|float|int|string|null
    {
        // The expected value could be "null" directly
        return strtolower(
            var_export(
                $this->expected,
                true
            )
        );
    }

    #[Override]
    protected function getFormattedActualValue(): bool|float|int|string|null
    {
        // Could be null or another type
        if (is_null($this->actual)) {
            return var_export(
                $this->actual,
                true
            );
        }

        return gettype($this->actual);
    }
}
