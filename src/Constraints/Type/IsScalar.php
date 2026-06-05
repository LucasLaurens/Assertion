<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Type;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function is_scalar;

final readonly class IsScalar extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_scalar($this->actual);
    }
}
