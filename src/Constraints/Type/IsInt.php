<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Type;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function is_int;

final readonly class IsInt extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_int(
            $this->actual
        );
    }
}
