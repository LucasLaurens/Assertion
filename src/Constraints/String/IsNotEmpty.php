<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\String;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;
use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function is_string;
use function gettype;

final readonly class IsNotEmpty extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_string($this->actual) && $this->actual !== '';
    }

    #[Override]
    protected function fail(): never
    {
        if (! is_string($this->actual)) {
            throw new InvalidAssertionException(
                sprintf('Expected string. Got: %s', gettype($this->actual))
            );
        }

        throw new InvalidAssertionException($this->pattern);
    }
}
