<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when array does not contain the value', function (): void {
    // Act & Assert
    assertion(['world'])->doesNotContainValue('hello');
})->throwsNoExceptions();

it('fails when array contains the value', function (): void {
    // Act & Assert
    assertion(['hello', 'world'])->doesNotContainValue('hello');
})->throws(
    InvalidAssertionException::class,
    'Expected array to not contain value hello'
);

it('passes with assertionNot when array contains the value', function (): void {
    // Act & Assert
    assertionNot(['hello', 'world'])->doesNotContainValue('hello');
})->throwsNoExceptions();

it('fails with assertionNot when array does not contain the value', function (): void {
    // Act & Assert
    assertionNot(['world'])->doesNotContainValue('hello');
})->throws(
    InvalidAssertionException::class,
    'Expected array to contain value hello'
);
