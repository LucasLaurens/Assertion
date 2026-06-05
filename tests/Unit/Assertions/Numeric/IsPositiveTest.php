<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is a positive integer', function (): void {
    // Act & Assert
    assertion(5)->positive();
})->throwsNoExceptions();

it('passes when value is a positive float', function (): void {
    // Act & Assert
    assertion(0.1)->positive();
})->throwsNoExceptions();

it('fails when value is zero', function (): void {
    // Act & Assert
    assertion(0)->positive();
})->throws(
    InvalidAssertionException::class,
    'Expected a positive number (> 0). Got: 0'
);

it('fails when value is a negative integer', function (): void {
    // Act & Assert
    assertion(-1)->positive();
})->throws(
    InvalidAssertionException::class,
    'Expected a positive number (> 0). Got: -1'
);

it('fails when value is a non-numeric string', function (): void {
    // Act & Assert
    assertion('abc')->positive();
})->throws(
    InvalidAssertionException::class,
    'Expected a positive number (> 0). Got: string'
);

it('passes with assertionNot when value is negative', function (): void {
    // Act & Assert
    assertionNot(-1)->positive();
})->throwsNoExceptions();

it('fails with assertionNot when value is positive', function (): void {
    // Act & Assert
    assertionNot(5)->positive();
})->throws(
    InvalidAssertionException::class,
    'Expected a non-positive number. Got: 5'
);
