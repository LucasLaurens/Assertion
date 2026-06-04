<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is a valid base64 string', function (): void {
    // Act & Assert
    assertion('SGVsbG8=')->base64();
})->throwsNoExceptions();

it('fails when value is not a valid base64 string', function (): void {
    // Act & Assert
    assertion('not-base64!')->base64();
})->throws(
    InvalidAssertionException::class,
    "Expected a valid base64 string. Got: 'not-base64!'"
);

it('passes with assertionNot when value is not base64', function (): void {
    // Act & Assert
    assertionNot('not-base64!')->base64();
})->throwsNoExceptions();

it('fails with assertionNot when value is valid base64', function (): void {
    // Act & Assert
    assertionNot('SGVsbG8=')->base64();
})->throws(
    InvalidAssertionException::class,
    "Expected a non-base64 string. Got: 'SGVsbG8='"
);
