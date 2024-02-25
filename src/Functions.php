<?php

declare(strict_types=1);

namespace LucasLaurens\Assertion;

if (!function_exists('assertion')) {
    /**
     * Creates a new assertion.
     *
     * @template TValue
     *
     * @param  TValue|null  $value
     * @return Assertion<TValue|null>
     */
    function assertion(mixed $value = null): Assertion
    {
        return new Assertion($value);
    }
}
