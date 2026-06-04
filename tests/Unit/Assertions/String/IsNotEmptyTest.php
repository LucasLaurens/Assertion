<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when string is not empty', function (): void {
    // Act & Assert
    assertion('hello')->stringNotEmpty();
})->throwsNoExceptions();

it('fails when string is empty', function (): void {
    // Act & Assert
    assertion('')->stringNotEmpty();
})->throws(
    InvalidAssertionException::class,
    'Expected a non-empty string'
);

it('passes with assertionNot when string is empty', function (): void {
    // Act & Assert
    assertionNot('')->stringNotEmpty();
})->throwsNoExceptions();

it('fails with assertionNot when string is not empty', function (): void {
    // Act & Assert
    assertionNot('hello')->stringNotEmpty();
})->throws(
    InvalidAssertionException::class,
    'Expected an empty string'
);
