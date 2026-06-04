<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when array contains the value', function (): void {
    // Act & Assert
    assertion(['hello', 'world'])->containsValue('hello');
})->throwsNoExceptions();

it('fails when array does not contain the value', function (): void {
    // Act & Assert
    assertion(['world'])->containsValue('hello');
})->throws(
    InvalidAssertionException::class,
    'Expected array to contain value hello'
);

it('passes with assertionNot when array does not contain the value', function (): void {
    // Act & Assert
    assertionNot(['world'])->containsValue('hello');
})->throwsNoExceptions();

it('fails with assertionNot when array contains the value', function (): void {
    // Act & Assert
    assertionNot(['hello', 'world'])->containsValue('hello');
})->throws(
    InvalidAssertionException::class,
    'Expected array not to contain value hello'
);
