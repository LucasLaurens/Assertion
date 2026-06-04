<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when array has more elements than minimum', function (): void {
    // Act & Assert
    assertion([1, 2, 3])->arrayMinCount(2);
})->throwsNoExceptions();

it('passes when array has exactly the minimum number of elements', function (): void {
    // Act & Assert
    assertion([1, 2])->arrayMinCount(2);
})->throwsNoExceptions();

it('fails when array has fewer elements than minimum', function (): void {
    // Act & Assert
    assertion([1])->arrayMinCount(2);
})->throws(
    InvalidAssertionException::class,
    'Expected at least 2 elements. Got: 1'
);

it('passes with assertionNot when array has fewer elements than minimum', function (): void {
    // Act & Assert
    assertionNot([1])->arrayMinCount(2);
})->throwsNoExceptions();

it('fails with assertionNot when array meets minimum count', function (): void {
    // Act & Assert
    assertionNot([1, 2, 3])->arrayMinCount(2);
})->throws(
    InvalidAssertionException::class,
    'Expected fewer than 2 elements. Got: 3'
);
