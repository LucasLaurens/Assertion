<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is within range', function (): void {
    // Act & Assert
    assertion(5)->between(1, 10);
})->throwsNoExceptions();

it('passes when value equals the minimum boundary', function (): void {
    // Act & Assert
    assertion(1)->between(1, 10);
})->throwsNoExceptions();

it('passes when value equals the maximum boundary', function (): void {
    // Act & Assert
    assertion(10)->between(1, 10);
})->throwsNoExceptions();

it('fails when value is below the range', function (): void {
    // Act & Assert
    assertion(0)->between(1, 10);
})->throws(
    InvalidAssertionException::class,
    'Expected value between 1 and 10. Got: 0'
);

it('fails when value is above the range', function (): void {
    // Act & Assert
    assertion(11)->between(1, 10);
})->throws(
    InvalidAssertionException::class,
    'Expected value between 1 and 10. Got: 11'
);

it('passes with assertionNot when value is outside range', function (): void {
    // Act & Assert
    assertionNot(0)->between(1, 10);
})->throwsNoExceptions();

it('fails with assertionNot when value is within range', function (): void {
    // Act & Assert
    assertionNot(5)->between(1, 10);
})->throws(
    InvalidAssertionException::class,
    'Expected value not between 1 and 10. Got: 5'
);
