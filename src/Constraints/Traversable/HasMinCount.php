<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Traversable;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;
use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function is_countable;
use function is_int;
use function count;
use function gettype;

final readonly class HasMinCount extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_countable($this->actual)
            && is_int($this->expected)
            && count($this->actual) >= $this->expected;
    }

    #[Override]
    protected function fail(): never
    {
        if (! is_countable($this->actual)) {
            throw new InvalidAssertionException(
                sprintf('Expected countable. Got: %s', gettype($this->actual))
            );
        }

        throw new InvalidAssertionException(
            sprintf($this->pattern, is_int($this->expected) ? $this->expected : 0, count($this->actual))
        );
    }
}
