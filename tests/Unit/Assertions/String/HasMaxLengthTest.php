<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when string is within maximum length', function (): void {
    // Act & Assert
    assertion('hello')->stringMaxLength(5);
})->throwsNoExceptions();

it('fails when string exceeds maximum length', function (): void {
    // Act & Assert
    assertion('hello world')->stringMaxLength(5);
})->throws(
    InvalidAssertionException::class,
    'Expected string with maximum length 5. Got: 11'
);

it('passes with assertionNot when string exceeds maximum length', function (): void {
    // Act & Assert
    assertionNot('hello world')->stringMaxLength(5);
})->throwsNoExceptions();

it('fails with assertionNot when string is within maximum length', function (): void {
    // Act & Assert
    assertionNot('hi')->stringMaxLength(5);
})->throws(
    InvalidAssertionException::class,
    'Expected string with length greater than 5. Got: 2'
);
