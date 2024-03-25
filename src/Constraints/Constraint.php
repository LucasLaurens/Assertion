<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints;

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function gettype;
use function is_scalar;

abstract readonly class Constraint
{
    public function __construct(
        protected mixed $actual,
        protected mixed $expected = null,
        protected string $pattern = '%s%s',
        protected bool $negative = false,
    ) {
    }

    public function evaluate(): bool
    {
        if (
            (!$this->negative && !$this->isMatching())
            || ($this->negative && $this->isMatching())
        ) {
            $this->fail();
        }

        return true;
    }

    protected function isMatching(): bool
    {
        return false;
    }

    protected function getFormattedExpectedValue(): bool|float|int|string|null
    {
        return is_scalar($this->expected)
            ? $this->expected
            : gettype($this->expected);
    }

    protected function getFormattedActualValue(): bool|float|int|string|null
    {
        return gettype($this->actual);
    }

    /**
     * @throws InvalidAssertionException
     */
    protected function fail(): never
    {
        throw new InvalidAssertionException(
            sprintf(
                $this->pattern,
                $this->getFormattedExpectedValue(),
                $this->getFormattedActualValue()
            )
        );
    }
}
