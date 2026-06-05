<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\String;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;
use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function is_string;
use function is_int;
use function mb_strlen;
use function gettype;

final readonly class HasLength extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_string($this->actual)
            && is_int($this->expected)
            && mb_strlen($this->actual) === $this->expected;
    }

    #[Override]
    protected function fail(): never
    {
        if (! is_string($this->actual)) {
            throw new InvalidAssertionException(
                sprintf('Expected string. Got: %s', gettype($this->actual))
            );
        }

        throw new InvalidAssertionException(
            sprintf($this->pattern, is_int($this->expected) ? $this->expected : 0, mb_strlen($this->actual))
        );
    }
}
