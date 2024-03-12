<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\String;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function is_string;

final readonly class IsString extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_string(
            $this->actual
        );
    }
}
