<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when string is all uppercase', function (): void {
    // Act & Assert
    assertion('HELLO')->uppercase();
})->throwsNoExceptions();

it('fails when string is all lowercase', function (): void {
    // Act & Assert
    assertion('hello')->uppercase();
})->throws(
    InvalidAssertionException::class,
    "Expected an uppercase string. Got: 'hello'"
);

it('fails when string is mixed case', function (): void {
    // Act & Assert
    assertion('Hello')->uppercase();
})->throws(
    InvalidAssertionException::class,
    "Expected an uppercase string. Got: 'Hello'"
);

it('passes with assertionNot when string is lowercase', function (): void {
    // Act & Assert
    assertionNot('hello')->uppercase();
})->throwsNoExceptions();

it('fails with assertionNot when string is uppercase', function (): void {
    // Act & Assert
    assertionNot('HELLO')->uppercase();
})->throws(
    InvalidAssertionException::class,
    "Expected a non-uppercase string. Got: 'HELLO'"
);
