<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is an even integer', function (): void {
    // Act & Assert
    assertion(4)->even();
})->throwsNoExceptions();

it('passes when value is zero', function (): void {
    // Act & Assert
    assertion(0)->even();
})->throwsNoExceptions();

it('fails when value is an odd integer', function (): void {
    // Act & Assert
    assertion(3)->even();
})->throws(
    InvalidAssertionException::class,
    'Expected an even integer. Got: 3'
);

it('fails when value is one', function (): void {
    // Act & Assert
    assertion(1)->even();
})->throws(
    InvalidAssertionException::class,
    'Expected an even integer. Got: 1'
);

it('passes with assertionNot when value is odd', function (): void {
    // Act & Assert
    assertionNot(3)->even();
})->throwsNoExceptions();

it('fails with assertionNot when value is even', function (): void {
    // Act & Assert
    assertionNot(4)->even();
})->throws(
    InvalidAssertionException::class,
    'Expected a non-even integer. Got: 4'
);
