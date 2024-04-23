<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\String;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function strstr;
use function is_string;
use function str_starts_with;
use function gettype;

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
    protected function getFormattedActualValue(): bool|float|int|string|null
    {
        return is_string($this->actual)
            ? strstr(
                $this->actual,
                ' ',
                true
            )
            : gettype($this->actual);
    }
}
