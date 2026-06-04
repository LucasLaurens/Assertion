<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value equals the limit', function (): void {
    // Act & Assert
    assertion(5)->lessThanOrEqualTo(5);
})->throwsNoExceptions();

it('passes when value is less than the limit', function (): void {
    // Act & Assert
    assertion(4)->lessThanOrEqualTo(5);
})->throwsNoExceptions();

it('fails when value is greater than the limit', function (): void {
    // Act & Assert
    assertion(6)->lessThanOrEqualTo(5);
})->throws(
    InvalidAssertionException::class,
    'Expected a value less than or equal to 5. Got: 6'
);

it('passes with assertionNot when value is greater than limit', function (): void {
    // Act & Assert
    assertionNot(6)->lessThanOrEqualTo(5);
})->throwsNoExceptions();

it('fails with assertionNot when value equals the limit', function (): void {
    // Act & Assert
    assertionNot(5)->lessThanOrEqualTo(5);
})->throws(
    InvalidAssertionException::class,
    'Expected a value not less than or equal to 5. Got: 5'
);
