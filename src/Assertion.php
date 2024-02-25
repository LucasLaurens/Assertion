<?php

declare(strict_types=1);

namespace LucasLaurens\Assert;

use LucasLaurens\Assert\Exceptions\InvalidAssertionException;

/**
 * @template TValue
 */
final readonly class Assertion
{
    /**
     * Creates a new expectation.
     *
     * @param  TValue  $value
     */
    public function __construct(
        public mixed $value
    ) {
    }

    public function isInstanceOf(string $fqcn): void
    {
        if (!$this->value instanceof $fqcn) {
            throw new InvalidAssertionException(
                sprintf(
                    'Expected an instance of %2$s. Got: %s',
                    get_debug_type($this->value),
                    $fqcn
                )
            );
        }
    }
}
