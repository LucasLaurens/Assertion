<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Traversable;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;
use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function is_array;
use function count;
use function array_unique;

use const SORT_REGULAR;

final readonly class IsUnique extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_array($this->actual)
            && count($this->actual) === count(array_unique($this->actual, SORT_REGULAR));
    }

    #[Override]
    protected function fail(): never
    {
        throw new InvalidAssertionException($this->pattern);
    }
}
