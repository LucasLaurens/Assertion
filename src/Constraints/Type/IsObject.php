<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Type;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function is_object;

final readonly class IsObject extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_object($this->actual);
    }
}
