<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\String;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function is_string;
use function json_validate;

final readonly class IsJson extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_string($this->actual)
            && json_validate($this->actual);
    }
}
