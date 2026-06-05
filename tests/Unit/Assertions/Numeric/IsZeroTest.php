<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is zero integer', function (): void {
    // Act & Assert
    assertion(0)->zero();
})->throwsNoExceptions();

it('passes when value is zero float', function (): void {
    // Act & Assert
    assertion(0.0)->zero();
})->throwsNoExceptions();

it('fails when value is a positive integer', function (): void {
    // Act & Assert
    assertion(1)->zero();
})->throws(
    InvalidAssertionException::class,
    'Expected zero. Got: 1'
);

it('fails when value is a negative integer', function (): void {
    // Act & Assert
    assertion(-1)->zero();
})->throws(
    InvalidAssertionException::class,
    'Expected zero. Got: -1'
);

it('passes with assertionNot when value is positive', function (): void {
    // Act & Assert
    assertionNot(1)->zero();
})->throwsNoExceptions();

it('fails with assertionNot when value is zero', function (): void {
    // Act & Assert
    assertionNot(0)->zero();
})->throws(
    InvalidAssertionException::class,
    'Expected a non-zero value. Got: 0'
);
