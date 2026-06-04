<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is a string scalar', function (): void {
    // Act & Assert
    assertion('hello')->scalar();
})->throwsNoExceptions();

it('fails when value is an array', function (): void {
    // Act & Assert
    assertion([])->scalar();
})->throws(
    InvalidAssertionException::class,
    'Expected scalar value type. Got: array'
);

it('passes with assertionNot when value is an array', function (): void {
    // Act & Assert
    assertionNot([])->scalar();
})->throwsNoExceptions();

it('fails with assertionNot when value is an integer', function (): void {
    // Act & Assert
    assertionNot(42)->scalar();
})->throws(
    InvalidAssertionException::class,
    'Expected an other value type than scalar'
);
