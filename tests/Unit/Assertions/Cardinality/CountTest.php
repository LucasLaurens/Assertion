<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes with array has 1 item', function (): void {
    assertion(['foo'])->count(1);
})->throwsNoExceptions();

it('fails with array has 1 item', function (): void {
    assertion(['foo', 'bar'])->count(1);
})->throws(
    InvalidAssertionException::class,
    "Expected an array to contain 1 elements. Got: 2"
);

it('passes with array has not 2 item', function (): void {
    assertionNot(['foo'])->count(2);
})->throwsNoExceptions();

it('fails with array has not 1 item', function (): void {
    assertionNot(['foo'])->count(1);
})->throws(
    InvalidAssertionException::class,
    "Expected an array not to contain 1 elements"
);
