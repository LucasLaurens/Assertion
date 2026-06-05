<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\String;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function is_string;
use function str_contains;

final readonly class Contains extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_string($this->actual)
            && is_string($this->expected)
            && str_contains(
                $this->actual,
                $this->expected
            );
    }
}
