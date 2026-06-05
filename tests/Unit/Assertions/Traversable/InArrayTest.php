<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is in the array', function (): void {
    // Act & Assert
    assertion('a')->inArray(['a', 'b', 'c']);
})->throwsNoExceptions();

it('fails when value is not in the array', function (): void {
    // Act & Assert
    assertion('d')->inArray(['a', 'b', 'c']);
})->throws(
    InvalidAssertionException::class,
    "Expected 'd' to be in the provided array"
);

it('passes with assertionNot when value is not in the array', function (): void {
    // Act & Assert
    assertionNot('d')->inArray(['a', 'b', 'c']);
})->throwsNoExceptions();

it('fails with assertionNot when value is in the array', function (): void {
    // Act & Assert
    assertionNot('a')->inArray(['a', 'b', 'c']);
})->throws(
    InvalidAssertionException::class,
    "Expected 'a' not to be in the provided array"
);
