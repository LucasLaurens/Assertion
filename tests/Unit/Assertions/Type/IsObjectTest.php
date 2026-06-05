<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is an object', function (): void {
    // Act & Assert
    assertion(new stdClass())->object();
})->throwsNoExceptions();

it('fails when value is an array', function (): void {
    // Act & Assert
    assertion([])->object();
})->throws(
    InvalidAssertionException::class,
    'Expected object value type. Got: array'
);

it('passes with assertionNot when value is an array', function (): void {
    // Act & Assert
    assertionNot([])->object();
})->throwsNoExceptions();

it('fails with assertionNot when value is an object', function (): void {
    // Act & Assert
    assertionNot(new stdClass())->object();
})->throws(
    InvalidAssertionException::class,
    'Expected an other value type than object'
);
