<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes when value is truthy integer', function (): void {
    // Act & Assert
    assertion(1)->truthy();
})->throwsNoExceptions();

it('passes when value is a non-empty string', function (): void {
    // Act & Assert
    assertion('hello')->truthy();
})->throwsNoExceptions();

it('passes when value is a non-empty array', function (): void {
    // Act & Assert
    assertion([1])->truthy();
})->throwsNoExceptions();

it('fails when value is zero', function (): void {
    // Act & Assert
    assertion(0)->truthy();
})->throws(
    InvalidAssertionException::class,
    'Expected a truthy value. Got: 0'
);

it('fails when value is an empty string', function (): void {
    // Act & Assert
    assertion('')->truthy();
})->throws(
    InvalidAssertionException::class,
    "Expected a truthy value. Got: ''"
);

it('fails when value is null', function (): void {
    // Act & Assert
    assertion(null)->truthy();
})->throws(
    InvalidAssertionException::class,
    'Expected a truthy value. Got: NULL'
);

it('passes with assertionNot when value is zero', function (): void {
    // Act & Assert
    assertionNot(0)->truthy();
})->throwsNoExceptions();

it('fails with assertionNot when value is truthy', function (): void {
    // Act & Assert
    assertionNot(1)->truthy();
})->throws(
    InvalidAssertionException::class,
    'Expected a non-truthy value. Got: 1'
);
