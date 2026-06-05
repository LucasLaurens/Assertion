<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Traversable;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;

use function is_array;
use function is_string;
use function is_int;
use function array_key_exists;

final readonly class DoesNotContainKey extends Constraint
{
    #[Override]
    protected function isMatching(): bool
    {
        return is_array($this->actual)
            && (is_string($this->expected) || is_int($this->expected))
            && ! array_key_exists($this->expected, $this->actual);
    }
}
