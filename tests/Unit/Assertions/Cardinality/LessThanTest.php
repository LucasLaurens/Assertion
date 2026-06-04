<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes with 1 less than 2', function (): void {
    assertion(1)->lessThan(2);
})->throwsNoExceptions();

it('fails with 2 less than 1', function (): void {
    assertion(2)->lessThan(1);
})->throws(
    InvalidAssertionException::class,
    "Expected a value less than 1. Got: 2"
);

it('passes with 2 not less than 1', function (): void {
    assertionNot(2)->lessThan(1);
})->throwsNoExceptions();

it(
    'fails with 1 not less than 2',
    function (): void {
        assertionNot(1)->lessThan(2);
    }
)->throws(
    InvalidAssertionException::class,
    "Expected a value not less than 2"
);
