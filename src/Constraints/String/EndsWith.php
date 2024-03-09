<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\String;

use LucasLaurens\Assertion\Constraints\Constraint;

use function trim;
use function is_int;
use function substr;
use function strrpos;
use function is_string;
use function str_ends_with;
use function get_debug_type;

final readonly class EndsWith extends Constraint
{
    protected function isMatching(): bool
    {
        return is_string($this->expected)
            && is_string($this->actual)
            && str_ends_with(
                $this->actual,
                $this->expected
            );
    }

    protected function getFormattedActualValue(): string|int|float
    {
        return is_string($this->actual)
            && is_int($offset = strrpos(
                $this->actual,
                ' '
            ))
            ? trim(substr(
                $this->actual,
                $offset
            ))
            : get_debug_type($this->actual);
    }
}
