<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints\Numeric;

use Override;
use LucasLaurens\Assertion\Constraints\Constraint;
use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function is_int;
use function is_float;
use function var_export;

final readonly class IsBetween extends Constraint
{
    public function __construct(
        mixed $actual,
        private int|float $min,
        private int|float $max,
        string $pattern = 'Expected value between %s and %s. Got: %s',
        bool $negative = false,
    ) {
        parent::__construct($actual, null, $pattern, $negative);
    }

    #[Override]
    protected function isMatching(): bool
    {
        return (is_int($this->actual) || is_float($this->actual))
            && $this->actual >= $this->min
            && $this->actual <= $this->max;
    }

    #[Override]
    protected function fail(): never
    {
        throw new InvalidAssertionException(
            sprintf(
                $this->pattern,
                var_export($this->min, true),
                var_export($this->max, true),
                var_export($this->actual, true)
            )
        );
    }
}
