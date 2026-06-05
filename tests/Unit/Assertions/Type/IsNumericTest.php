<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is a numeric string', function (): void {
    // Act & Assert
    assertion('42')->numeric();
})->throwsNoExceptions();

it('passes when value is an integer', function (): void {
    // Act & Assert
    assertion(42)->numeric();
})->throwsNoExceptions();

it('fails when value is a non-numeric string', function (): void {
    // Act & Assert
    assertion('abc')->numeric();
})->throws(
    InvalidAssertionException::class,
    "Expected numeric value. Got: string"
);

it('passes with assertionNot when value is a non-numeric string', function (): void {
    // Act & Assert
    assertionNot('abc')->numeric();
})->throwsNoExceptions();

it('fails with assertionNot when value is an integer', function (): void {
    // Act & Assert
    assertionNot(42)->numeric();
})->throws(
    InvalidAssertionException::class,
    'Expected a non-numeric value'
);
