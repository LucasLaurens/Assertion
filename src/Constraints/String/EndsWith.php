<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\String;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function trim;
use function substr;
use function strrpos;
use function is_string;
use function str_ends_with;
use function gettype;

final readonly class EndsWith extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_string($this->expected)
            && is_string($this->actual)
            && str_ends_with(
                $this->actual,
                $this->expected
            );
    }

    #[Override]
    protected function getFormattedActualValue(): bool|float|int|string|null
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
            : gettype($this->actual);
    }
}
