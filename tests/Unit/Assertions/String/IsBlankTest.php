<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when string contains only whitespace', function (): void {
    // Act & Assert
    assertion('   ')->blank();
})->throwsNoExceptions();

it('passes when string is empty', function (): void {
    // Act & Assert
    assertion('')->blank();
})->throwsNoExceptions();

it('fails when string contains non-whitespace characters', function (): void {
    // Act & Assert
    assertion('hello')->blank();
})->throws(
    InvalidAssertionException::class,
    "Expected a blank string (whitespace only). Got: 'hello'"
);

it('passes with assertionNot when string is not blank', function (): void {
    // Act & Assert
    assertionNot('hello')->blank();
})->throwsNoExceptions();

it('fails with assertionNot when string is blank', function (): void {
    // Act & Assert
    assertionNot('   ')->blank();
})->throws(
    InvalidAssertionException::class,
    "Expected a non-blank string. Got: '   '"
);
