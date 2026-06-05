<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is a float', function (): void {
    // Act & Assert
    assertion(1.5)->float();
})->throwsNoExceptions();

it('fails when value is an integer', function (): void {
    // Act & Assert
    assertion(1)->float();
})->throws(
    InvalidAssertionException::class,
    'Expected float value type. Got: integer'
);

it('passes with assertionNot when value is an integer', function (): void {
    // Act & Assert
    assertionNot(1)->float();
})->throwsNoExceptions();

it('fails with assertionNot when value is a float', function (): void {
    // Act & Assert
    assertionNot(1.5)->float();
})->throws(
    InvalidAssertionException::class,
    'Expected an other value type than float'
);
