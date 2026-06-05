<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when string has exact length', function (): void {
    // Act & Assert
    assertion('hello')->stringLength(5);
})->throwsNoExceptions();

it('fails when string length does not match', function (): void {
    // Act & Assert
    assertion('hi')->stringLength(5);
})->throws(
    InvalidAssertionException::class,
    'Expected string of length 5. Got: 2'
);

it('passes with assertionNot when string length differs', function (): void {
    // Act & Assert
    assertionNot('hi')->stringLength(5);
})->throwsNoExceptions();

it('fails with assertionNot when string has exact length', function (): void {
    // Act & Assert
    assertionNot('hello')->stringLength(5);
})->throws(
    InvalidAssertionException::class,
    'Expected string not of length 5. Got: 5'
);
