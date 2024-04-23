<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes with 2 greater than 1', function (): void {
    assertion(2)->greaterThan(1);
})->throwsNoExceptions();

it('fails with 1 greater than 2', function (): void {
    assertion(1)->greaterThan(2);
})->throws(
    InvalidAssertionException::class,
    "Expected a value greater than 2. Got: 1"
);

it('passes with 1 not greater than 2', function (): void {
    assertionNot(1)->greaterThan(2);
})->throwsNoExceptions();

it(
    'fails with 2 not greater than 1',
    function (): void {
        assertionNot(2)->greaterThan(1);
    }
)->throws(
    InvalidAssertionException::class,
    "Expected a value not greater than 1"
);
