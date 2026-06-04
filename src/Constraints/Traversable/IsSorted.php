<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Traversable;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;
use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function is_array;
use function array_values;
use function count;

final readonly class IsSorted extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        if (! is_array($this->actual)) {
            return false;
        }

        $values = array_values($this->actual);
        $count = count($values);

        for ($i = 1; $i < $count; $i++) {
            if ($values[$i] < $values[$i - 1]) {
                return false;
            }
        }

        return true;
    }

    #[Override]
    protected function fail(): never
    {
        throw new InvalidAssertionException($this->pattern);
    }
}
