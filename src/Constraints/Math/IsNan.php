<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Math;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function is_nan;
use function is_float;

final readonly class IsNan extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return
            is_float($this->actual)
            && is_nan($this->actual);
    }
}
