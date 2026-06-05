<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is a valid URL', function (): void {
    // Act & Assert
    assertion('https://example.com')->validUrl();
})->throwsNoExceptions();

it('fails when value is not a valid URL', function (): void {
    // Act & Assert
    assertion('not-a-url')->validUrl();
})->throws(
    InvalidAssertionException::class,
    "Expected a valid URL. Got: 'not-a-url'"
);

it('passes with assertionNot when value is not a valid URL', function (): void {
    // Act & Assert
    assertionNot('not-a-url')->validUrl();
})->throwsNoExceptions();

it('fails with assertionNot when value is a valid URL', function (): void {
    // Act & Assert
    assertionNot('https://example.com')->validUrl();
})->throws(
    InvalidAssertionException::class,
    "Expected a non-URL value. Got: 'https://example.com'"
);
