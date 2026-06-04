<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value equals the limit', function (): void {
    // Act & Assert
    assertion(5)->greaterThanOrEqualTo(5);
})->throwsNoExceptions();

it('passes when value is greater than the limit', function (): void {
    // Act & Assert
    assertion(6)->greaterThanOrEqualTo(5);
})->throwsNoExceptions();

it('fails when value is less than the limit', function (): void {
    // Act & Assert
    assertion(4)->greaterThanOrEqualTo(5);
})->throws(
    InvalidAssertionException::class,
    'Expected a value greater than or equal to 5. Got: 4'
);

it('passes with assertionNot when value is less than limit', function (): void {
    // Act & Assert
    assertionNot(4)->greaterThanOrEqualTo(5);
})->throwsNoExceptions();

it('fails with assertionNot when value equals the limit', function (): void {
    // Act & Assert
    assertionNot(5)->greaterThanOrEqualTo(5);
})->throws(
    InvalidAssertionException::class,
    'Expected a value not greater than or equal to 5. Got: 5'
);
