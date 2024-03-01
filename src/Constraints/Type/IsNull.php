<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Type;

use LucasLaurens\Assertion\Constraints\Constraint;

final readonly class IsNull extends Constraint
{
    protected function isMatching(): bool
    {
        return null === $this->actual;
    }
}
