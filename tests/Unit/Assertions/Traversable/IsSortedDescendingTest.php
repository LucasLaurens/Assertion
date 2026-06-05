<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when array is sorted in descending order', function (): void {
    // Act & Assert
    assertion([3, 2, 1])->sortedDescending();
})->throwsNoExceptions();

it('fails when array is not sorted in descending order', function (): void {
    // Act & Assert
    assertion([1, 2, 3])->sortedDescending();
})->throws(
    InvalidAssertionException::class,
    'Expected array to be sorted in descending order'
);

it('passes with assertionNot when array is not sorted descending', function (): void {
    // Act & Assert
    assertionNot([1, 2, 3])->sortedDescending();
})->throwsNoExceptions();

it('fails with assertionNot when array is sorted descending', function (): void {
    // Act & Assert
    assertionNot([3, 2, 1])->sortedDescending();
})->throws(
    InvalidAssertionException::class,
    'Expected array not to be sorted in descending order'
);
