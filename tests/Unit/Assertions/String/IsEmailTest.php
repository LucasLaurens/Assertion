<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is a valid email', function (): void {
    // Act & Assert
    assertion('user@example.com')->validEmail();
})->throwsNoExceptions();

it('fails when value is not a valid email', function (): void {
    // Act & Assert
    assertion('not-an-email')->validEmail();
})->throws(
    InvalidAssertionException::class,
    "Expected a valid email address. Got: 'not-an-email'"
);

it('passes with assertionNot when value is not a valid email', function (): void {
    // Act & Assert
    assertionNot('not-an-email')->validEmail();
})->throwsNoExceptions();

it('fails with assertionNot when value is a valid email', function (): void {
    // Act & Assert
    assertionNot('user@example.com')->validEmail();
})->throws(
    InvalidAssertionException::class,
    "Expected a non-email value. Got: 'user@example.com'"
);
