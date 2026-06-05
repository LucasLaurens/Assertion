<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Traversable;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;
use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function is_array;
use function in_array;
use function var_export;

final readonly class InArray extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_array($this->expected)
            && in_array($this->actual, $this->expected, strict: true);
    }

    #[Override]
    protected function fail(): never
    {
        throw new InvalidAssertionException(
            sprintf($this->pattern, var_export($this->actual, true))
        );
    }
}
