<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\String;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;
use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function is_string;
use function preg_match;
use function var_export;
use function gettype;

final readonly class IsSlug extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_string($this->actual)
            && $this->actual !== ''
            && preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $this->actual) === 1;
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
