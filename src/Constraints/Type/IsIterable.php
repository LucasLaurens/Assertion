<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Type;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function is_iterable;

final readonly class IsIterable extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_iterable($this->actual);
    }
}
