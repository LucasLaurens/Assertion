<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion\Constraints;

use LucasLaurens\Assertion\Enums\Type;
use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function is_int;
use function is_float;
use function is_string;
use function is_countable;
use function get_debug_type;

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

    /** @todo Add for every constraint that needs it */
    protected function getFormattedExpectedValue(): string|int|float
    {
        if (
            !is_string($this->expected)
            && !is_int($this->expected)
            && !is_float($this->expected)
        ) {
            return Type::STRING->value;
        }

        return $this->expected;
    }

    /** @todo Add for every constraint that needs it */
    protected function getFormattedActualValue(): string|int|float
    {
        return is_countable($this->actual)
            ? count($this->actual)
            : get_debug_type(
                $this->actual
            );
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
