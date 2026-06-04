<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Type;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

final readonly class IsInstanceOf extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_string($this->expected) && $this->actual instanceof $this->expected;
    }
}
