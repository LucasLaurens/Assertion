<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is an array', function (): void {
    // Act & Assert
    assertion([])->countable();
})->throwsNoExceptions();

it('fails when value is a string', function (): void {
    // Act & Assert
    assertion('foo')->countable();
})->throws(
    InvalidAssertionException::class,
    'Expected countable value. Got: string'
);

it('passes with assertionNot when value is a string', function (): void {
    // Act & Assert
    assertionNot('foo')->countable();
})->throwsNoExceptions();

it('fails with assertionNot when value is an array', function (): void {
    // Act & Assert
    assertionNot([])->countable();
})->throws(
    InvalidAssertionException::class,
    'Expected a non-countable value'
);
