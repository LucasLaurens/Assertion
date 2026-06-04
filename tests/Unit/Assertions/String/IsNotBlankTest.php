<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when string has non-whitespace content', function (): void {
    // Act & Assert
    assertion('hello')->notBlank();
})->throwsNoExceptions();

it('fails when string contains only whitespace', function (): void {
    // Act & Assert
    assertion('   ')->notBlank();
})->throws(
    InvalidAssertionException::class,
    "Expected a non-blank string. Got: '   '"
);

it('fails when string is empty', function (): void {
    // Act & Assert
    assertion('')->notBlank();
})->throws(
    InvalidAssertionException::class,
    "Expected a non-blank string. Got: ''"
);

it('passes with assertionNot when string is whitespace only', function (): void {
    // Act & Assert
    assertionNot('   ')->notBlank();
})->throwsNoExceptions();

it('fails with assertionNot when string is not blank', function (): void {
    // Act & Assert
    assertionNot('hello')->notBlank();
})->throws(
    InvalidAssertionException::class,
    "Expected a blank string. Got: 'hello'"
);
