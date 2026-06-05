<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\String;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;
use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function is_string;
use function filter_var;
use function var_export;
use function gettype;

use const FILTER_VALIDATE_URL;

final readonly class IsUrl extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_string($this->actual)
            && filter_var($this->actual, FILTER_VALIDATE_URL) !== false;
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
