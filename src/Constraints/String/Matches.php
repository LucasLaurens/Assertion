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

final readonly class Matches extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_string($this->actual)
            && is_string($this->expected)
            && preg_match($this->expected, $this->actual) === 1;
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
            sprintf(
                $this->pattern,
                is_string($this->expected) ? $this->expected : '',
                var_export($this->actual, true)
            )
        );
    }
}
