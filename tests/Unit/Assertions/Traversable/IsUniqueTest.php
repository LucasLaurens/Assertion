<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when array contains only unique values', function (): void {
    // Act & Assert
    assertion([1, 2, 3])->unique();
})->throwsNoExceptions();

it('fails when array contains duplicate values', function (): void {
    // Act & Assert
    assertion([1, 2, 2])->unique();
})->throws(
    InvalidAssertionException::class,
    'Expected array to contain only unique values'
);

it('passes with assertionNot when array has duplicates', function (): void {
    // Act & Assert
    assertionNot([1, 2, 2])->unique();
})->throwsNoExceptions();

it('fails with assertionNot when array is unique', function (): void {
    // Act & Assert
    assertionNot([1, 2, 3])->unique();
})->throws(
    InvalidAssertionException::class,
    'Expected array to contain duplicate values'
);
