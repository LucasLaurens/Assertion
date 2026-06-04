<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is an odd integer', function (): void {
    // Act & Assert
    assertion(3)->odd();
})->throwsNoExceptions();

it('passes when value is another odd integer', function (): void {
    // Act & Assert
    assertion(7)->odd();
})->throwsNoExceptions();

it('fails when value is an even integer', function (): void {
    // Act & Assert
    assertion(4)->odd();
})->throws(
    InvalidAssertionException::class,
    'Expected an odd integer. Got: 4'
);

it('fails when value is zero', function (): void {
    // Act & Assert
    assertion(0)->odd();
})->throws(
    InvalidAssertionException::class,
    'Expected an odd integer. Got: 0'
);

it('passes with assertionNot when value is even', function (): void {
    // Act & Assert
    assertionNot(4)->odd();
})->throwsNoExceptions();

it('fails with assertionNot when value is odd', function (): void {
    // Act & Assert
    assertionNot(3)->odd();
})->throws(
    InvalidAssertionException::class,
    'Expected a non-odd integer. Got: 3'
);
