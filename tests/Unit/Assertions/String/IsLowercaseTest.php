<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when string is all lowercase', function (): void {
    // Act & Assert
    assertion('hello')->lowercase();
})->throwsNoExceptions();

it('fails when string is all uppercase', function (): void {
    // Act & Assert
    assertion('HELLO')->lowercase();
})->throws(
    InvalidAssertionException::class,
    "Expected a lowercase string. Got: 'HELLO'"
);

it('fails when string is mixed case', function (): void {
    // Act & Assert
    assertion('Hello')->lowercase();
})->throws(
    InvalidAssertionException::class,
    "Expected a lowercase string. Got: 'Hello'"
);

it('passes with assertionNot when string is uppercase', function (): void {
    // Act & Assert
    assertionNot('HELLO')->lowercase();
})->throwsNoExceptions();

it('fails with assertionNot when string is lowercase', function (): void {
    // Act & Assert
    assertionNot('hello')->lowercase();
})->throws(
    InvalidAssertionException::class,
    "Expected a non-lowercase string. Got: 'hello'"
);
