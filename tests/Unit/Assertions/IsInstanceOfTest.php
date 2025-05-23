<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\assertion;

it('assertion with stdClass argument', function (): void {
    assertion(new stdClass())->isInstanceOf(stdClass::class);
})->throwsNoExceptions();

it('throw assertion failed exception with string argument', function (): void {
    assertion('foo')->isInstanceOf(stdClass::class);
})->throws(
    InvalidAssertionException::class,
    "Expected an instance of stdClass. Got: string"
);
