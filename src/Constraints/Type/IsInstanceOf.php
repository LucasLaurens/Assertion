<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Type;

use LucasLaurens\Assertion\Constraints\Constraint;

final readonly class IsInstanceOf extends Constraint
{
    protected function isMatching(): bool
    {
        return $this->actual instanceof $this->expected;
    }
}
