<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes with assertion must be a list', function (): void {
    assertion([1, 2, 3])->list();
})->throwsNoExceptions();

it('fails with assertion must be a list', function (): void {
    assertion([
        1 => 'foo',
        2 => 'bar'
    ])->list();
})->throws(
    InvalidAssertionException::class,
    "Expected array to be a list"
);

it('passes with assertion must not be a list', function (): void {
    assertionNot([
        1 => 'foo',
        2 => 'bar'
    ])->list();
})->throwsNoExceptions();

it('fails with assertion must not be a list', function (): void {
    assertionNot([1, 2, 3])->list();
})->throws(
    InvalidAssertionException::class,
    "Expected array not to be a list"
);
