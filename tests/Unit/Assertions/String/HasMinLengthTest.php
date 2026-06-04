<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when string meets minimum length', function (): void {
    // Act & Assert
    assertion('hello')->stringMinLength(3);
})->throwsNoExceptions();

it('fails when string is too short', function (): void {
    // Act & Assert
    assertion('hi')->stringMinLength(3);
})->throws(
    InvalidAssertionException::class,
    'Expected string with minimum length 3. Got: 2'
);

it('passes with assertionNot when string is too short', function (): void {
    // Act & Assert
    assertionNot('hi')->stringMinLength(3);
})->throwsNoExceptions();

it('fails with assertionNot when string meets minimum length', function (): void {
    // Act & Assert
    assertionNot('hello')->stringMinLength(3);
})->throws(
    InvalidAssertionException::class,
    'Expected string with length less than 3. Got: 5'
);
