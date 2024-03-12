<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\String;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function strstr;
use function is_string;
use function get_debug_type;
use function str_starts_with;

final readonly class StartsWith extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_string($this->expected)
            && is_string($this->actual)
            && str_starts_with(
                $this->actual,
                $this->expected
            );
    }

    #[Override]
    protected function getFormattedActualValue(): string|int|float
    {
        return is_string($this->actual)
            && is_string(
                $strStr = strstr(
                    $this->actual,
                    ' ',
                    true
                )
            )
            ? $strStr
            : get_debug_type($this->actual);
    }
}
