<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when string is alphanumeric', function (): void {
    // Act & Assert
    assertion('hello123')->alphanumeric();
})->throwsNoExceptions();

it('fails when string contains special characters', function (): void {
    // Act & Assert
    assertion('hello!')->alphanumeric();
})->throws(
    InvalidAssertionException::class,
    "Expected a string containing only letters and digits. Got: 'hello!'"
);

it('passes with assertionNot when string contains special characters', function (): void {
    // Act & Assert
    assertionNot('hello!')->alphanumeric();
})->throwsNoExceptions();

it('fails with assertionNot when string is alphanumeric', function (): void {
    // Act & Assert
    assertionNot('hello123')->alphanumeric();
})->throws(
    InvalidAssertionException::class,
    "Expected a string not containing only letters and digits. Got: 'hello123'"
);
