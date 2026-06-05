<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Traversable;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function is_array;
use function in_array;

final readonly class DoesNotContainValue extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_array($this->actual)
            && ! in_array($this->expected, $this->actual, strict: true);
    }
}
