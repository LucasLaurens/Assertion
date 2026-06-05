<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes with assertion is an integer', function (): void {
    assertion(10)->integer();
})->throwsNoExceptions();

it('fails with assertion is an integer', function (): void {
    assertion('foo')->integer();
})->throws(
    InvalidAssertionException::class,
    "Expected int value type. Got: string"
);

it('passes with assertion is not an integer', function (): void {
    assertionNot('foo')->integer();
})->throwsNoExceptions();

it('fails with assertion is not an integer', function (): void {
    assertionNot(10)->integer();
})->throws(
    InvalidAssertionException::class,
    "Expected an other value type than int"
);
