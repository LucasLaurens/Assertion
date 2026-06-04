<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\String;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;
use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function is_string;
use function mb_strtolower;
use function var_export;
use function gettype;

final readonly class IsLowercase extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_string($this->actual)
            && $this->actual !== ''
            && mb_strtolower($this->actual) === $this->actual;
    }

    #[Override]
    protected function fail(): never
    {
        throw new InvalidAssertionException(
            sprintf(
                $this->pattern,
                is_string($this->actual) ? var_export($this->actual, true) : gettype($this->actual)
            )
        );
    }
}
