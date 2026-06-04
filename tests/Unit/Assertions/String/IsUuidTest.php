<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is a valid UUID', function (): void {
    // Act & Assert
    assertion('550e8400-e29b-41d4-a716-446655440000')->validUuid();
})->throwsNoExceptions();

it('fails when value is not a valid UUID', function (): void {
    // Act & Assert
    assertion('not-a-uuid')->validUuid();
})->throws(
    InvalidAssertionException::class,
    "Expected a valid UUID. Got: 'not-a-uuid'"
);

it('passes with assertionNot when value is not a valid UUID', function (): void {
    // Act & Assert
    assertionNot('not-a-uuid')->validUuid();
})->throwsNoExceptions();

it('fails with assertionNot when value is a valid UUID', function (): void {
    // Act & Assert
    assertionNot('550e8400-e29b-41d4-a716-446655440000')->validUuid();
})->throws(
    InvalidAssertionException::class,
    "Expected a non-UUID value. Got: '550e8400-e29b-41d4-a716-446655440000'"
);
