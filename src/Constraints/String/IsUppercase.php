<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\String;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;
use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function is_string;
use function mb_strtoupper;
use function var_export;
use function gettype;

final readonly class IsUppercase extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_string($this->actual)
            && $this->actual !== ''
            && mb_strtoupper($this->actual) === $this->actual;
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
