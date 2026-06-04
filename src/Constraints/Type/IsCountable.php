<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Type;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function is_countable;

final readonly class IsCountable extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_countable($this->actual);
    }
}
