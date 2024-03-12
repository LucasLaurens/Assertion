<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Cardinality;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function count;
use function is_int;
use function is_countable;

final readonly class Count extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return (
            is_countable($this->actual)
        )
            && is_int($this->expected)
            && count($this->actual) === $this->expected;
    }
}
