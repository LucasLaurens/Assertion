<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is a valid short hex color', function (): void {
    // Act & Assert
    assertion('#fff')->hexColor();
})->throwsNoExceptions();

it('passes when value is a valid full hex color', function (): void {
    // Act & Assert
    assertion('#ffffff')->hexColor();
})->throwsNoExceptions();

it('fails when value is missing the hash prefix', function (): void {
    // Act & Assert
    assertion('fff')->hexColor();
})->throws(
    InvalidAssertionException::class,
    "Expected a valid hex color (e.g. #fff or #ffffff). Got: 'fff'"
);

it('fails when value contains invalid hex characters', function (): void {
    // Act & Assert
    assertion('#gggggg')->hexColor();
})->throws(
    InvalidAssertionException::class,
    "Expected a valid hex color (e.g. #fff or #ffffff). Got: '#gggggg'"
);

it('passes with assertionNot when value is not a hex color', function (): void {
    // Act & Assert
    assertionNot('fff')->hexColor();
})->throwsNoExceptions();

it('fails with assertionNot when value is a valid hex color', function (): void {
    // Act & Assert
    assertionNot('#fff')->hexColor();
})->throws(
    InvalidAssertionException::class,
    "Expected a non-hex-color value. Got: '#fff'"
);
