<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Boolean;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;
use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function gettype;
use function var_export;

final readonly class IsFalsy extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return ! ((bool) $this->actual);
    }

    #[Override]
    protected function fail(): never
    {
        throw new InvalidAssertionException(
            sprintf(
                $this->pattern,
                is_scalar($this->actual) ? var_export($this->actual, true) : gettype($this->actual)
            )
        );
    }
}
