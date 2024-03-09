<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes with assertion is a string', function (): void {
    assertion('foo')->string();
})->throwsNoExceptions();

it('fails with assertion is a string', function (): void {
    assertion(10)->string();
})->throws(
    InvalidAssertionException::class,
    "Expected string value type. Got: int"
);

it('passes with assertion is not a string', function (): void {
    assertionNot(10)->string();
})->throwsNoExceptions();

it('fails with assertion is not a string', function (): void {
    assertionNot('foo')->string();
})->throws(
    InvalidAssertionException::class,
    "Expected an other value type than string"
);
