<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Traversable;

use LucasLaurens\Assertion\Constraints\Constraint;

use function is_array;
use function array_is_list;

final readonly class IsList extends Constraint
{
    protected function isMatching(): bool
    {
        return is_array($this->actual)
            && array_is_list($this->actual);
    }
}
