<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes with 1 equal to 1', function (): void {
    assertion(1)->equal(1);
})->throwsNoExceptions();

it('fails with 2 equal to 1', function (): void {
    assertion(2)->equal(1);
})->throws(
    InvalidAssertionException::class,
    "Expected a value equal to 1. Got: 2"
);

it('passes with 1 not equal to 2', function (): void {
    assertionNot(1)->equal(2);
})->throwsNoExceptions();

it('fails with 1 not equal to 1', function (): void {
    assertionNot(1)->equal(1);
})->throws(
    InvalidAssertionException::class,
    "Expected a value not equal to 1"
);
