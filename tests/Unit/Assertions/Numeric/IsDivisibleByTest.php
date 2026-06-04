<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is divisible by divisor', function (): void {
    // Act & Assert
    assertion(9)->divisibleBy(3);
})->throwsNoExceptions();

it('passes when value is zero', function (): void {
    // Act & Assert
    assertion(0)->divisibleBy(3);
})->throwsNoExceptions();

it('fails when value is not divisible by divisor', function (): void {
    // Act & Assert
    assertion(7)->divisibleBy(3);
})->throws(
    InvalidAssertionException::class,
    'Expected value to be divisible by 3. Got: 7'
);

it('passes with assertionNot when value is not divisible', function (): void {
    // Act & Assert
    assertionNot(7)->divisibleBy(3);
})->throwsNoExceptions();

it('fails with assertionNot when value is divisible', function (): void {
    // Act & Assert
    assertionNot(9)->divisibleBy(3);
})->throws(
    InvalidAssertionException::class,
    'Expected value not to be divisible by 3. Got: 9'
);
