<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is a negative integer', function (): void {
    // Act & Assert
    assertion(-5)->negative();
})->throwsNoExceptions();

it('passes when value is a negative float', function (): void {
    // Act & Assert
    assertion(-0.1)->negative();
})->throwsNoExceptions();

it('fails when value is zero', function (): void {
    // Act & Assert
    assertion(0)->negative();
})->throws(
    InvalidAssertionException::class,
    'Expected a negative number (< 0). Got: 0'
);

it('fails when value is a positive integer', function (): void {
    // Act & Assert
    assertion(1)->negative();
})->throws(
    InvalidAssertionException::class,
    'Expected a negative number (< 0). Got: 1'
);

it('passes with assertionNot when value is positive', function (): void {
    // Act & Assert
    assertionNot(1)->negative();
})->throwsNoExceptions();

it('fails with assertionNot when value is negative', function (): void {
    // Act & Assert
    assertionNot(-5)->negative();
})->throws(
    InvalidAssertionException::class,
    'Expected a non-negative number. Got: -5'
);
