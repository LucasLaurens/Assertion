<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is zero', function (): void {
    // Act & Assert
    assertion(0)->falsy();
})->throwsNoExceptions();

it('passes when value is an empty string', function (): void {
    // Act & Assert
    assertion('')->falsy();
})->throwsNoExceptions();

it('passes when value is an empty array', function (): void {
    // Act & Assert
    assertion([])->falsy();
})->throwsNoExceptions();

it('passes when value is null', function (): void {
    // Act & Assert
    assertion(null)->falsy();
})->throwsNoExceptions();

it('fails when value is truthy integer', function (): void {
    // Act & Assert
    assertion(1)->falsy();
})->throws(
    InvalidAssertionException::class,
    'Expected a falsy value. Got: 1'
);

it('fails when value is a non-empty string', function (): void {
    // Act & Assert
    assertion('hello')->falsy();
})->throws(
    InvalidAssertionException::class,
    "Expected a falsy value. Got: 'hello'"
);

it('passes with assertionNot when value is truthy', function (): void {
    // Act & Assert
    assertionNot(1)->falsy();
})->throwsNoExceptions();

it('fails with assertionNot when value is falsy', function (): void {
    // Act & Assert
    assertionNot(0)->falsy();
})->throws(
    InvalidAssertionException::class,
    'Expected a non-falsy value. Got: 0'
);
