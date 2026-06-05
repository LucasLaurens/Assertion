<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when array is sorted in ascending order', function (): void {
    // Act & Assert
    assertion([1, 2, 3])->sorted();
})->throwsNoExceptions();

it('fails when array is not sorted in ascending order', function (): void {
    // Act & Assert
    assertion([3, 1, 2])->sorted();
})->throws(
    InvalidAssertionException::class,
    'Expected array to be sorted in ascending order'
);

it('passes with assertionNot when array is not sorted', function (): void {
    // Act & Assert
    assertionNot([3, 1, 2])->sorted();
})->throwsNoExceptions();

it('fails with assertionNot when array is sorted', function (): void {
    // Act & Assert
    assertionNot([1, 2, 3])->sorted();
})->throws(
    InvalidAssertionException::class,
    'Expected array not to be sorted in ascending order'
);
