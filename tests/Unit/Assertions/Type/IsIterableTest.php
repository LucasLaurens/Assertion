<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is an array', function (): void {
    // Act & Assert
    assertion([])->iterable();
})->throwsNoExceptions();

it('fails when value is an integer', function (): void {
    // Act & Assert
    assertion(42)->iterable();
})->throws(
    InvalidAssertionException::class,
    'Expected iterable value. Got: integer'
);

it('passes with assertionNot when value is an integer', function (): void {
    // Act & Assert
    assertionNot(42)->iterable();
})->throwsNoExceptions();

it('fails with assertionNot when value is an array', function (): void {
    // Act & Assert
    assertionNot([])->iterable();
})->throws(
    InvalidAssertionException::class,
    'Expected a non-iterable value'
);
