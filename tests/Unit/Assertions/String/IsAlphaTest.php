<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when string contains only lowercase letters', function (): void {
    // Act & Assert
    assertion('hello')->alpha();
})->throwsNoExceptions();

it('passes when string contains only uppercase letters', function (): void {
    // Act & Assert
    assertion('ABC')->alpha();
})->throwsNoExceptions();

it('fails when string contains letters and digits', function (): void {
    // Act & Assert
    assertion('hello1')->alpha();
})->throws(
    InvalidAssertionException::class,
    "Expected a string containing only letters. Got: 'hello1'"
);

it('fails when string contains special characters', function (): void {
    // Act & Assert
    assertion('hello!')->alpha();
})->throws(
    InvalidAssertionException::class,
    "Expected a string containing only letters. Got: 'hello!'"
);

it('passes with assertionNot when string contains digits', function (): void {
    // Act & Assert
    assertionNot('hello1')->alpha();
})->throwsNoExceptions();

it('fails with assertionNot when string contains only letters', function (): void {
    // Act & Assert
    assertionNot('hello')->alpha();
})->throws(
    InvalidAssertionException::class,
    "Expected a string not containing only letters. Got: 'hello'"
);
