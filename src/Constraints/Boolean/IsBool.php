<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Boolean;

use LucasLaurens\Assertion\Constraints\Constraint;

use function is_bool;

final readonly class IsBool extends Constraint
{
    protected function isMatching(): bool
    {
        return is_bool(
            $this->actual
        );
    }
}
