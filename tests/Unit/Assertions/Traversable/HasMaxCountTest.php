<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when array has fewer elements than maximum', function (): void {
    // Act & Assert
    assertion([1])->arrayMaxCount(2);
})->throwsNoExceptions();

it('passes when array has exactly the maximum number of elements', function (): void {
    // Act & Assert
    assertion([1, 2])->arrayMaxCount(2);
})->throwsNoExceptions();

it('fails when array exceeds the maximum count', function (): void {
    // Act & Assert
    assertion([1, 2, 3])->arrayMaxCount(2);
})->throws(
    InvalidAssertionException::class,
    'Expected at most 2 elements. Got: 3'
);

it('passes with assertionNot when array exceeds maximum count', function (): void {
    // Act & Assert
    assertionNot([1, 2, 3])->arrayMaxCount(2);
})->throwsNoExceptions();

it('fails with assertionNot when array is within maximum count', function (): void {
    // Act & Assert
    assertionNot([1])->arrayMaxCount(2);
})->throws(
    InvalidAssertionException::class,
    'Expected more than 2 elements. Got: 1'
);
