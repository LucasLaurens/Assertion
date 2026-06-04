<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes with assertion is null', function (): void {
    assertion(null)->null();
})->throwsNoExceptions();

it('fails with assertion is null', function (): void {
    assertion('foo')->null();
})->throws(
    InvalidAssertionException::class,
    "Expected null value. Got: string"
);

it('passes with assertion is not null', function (): void {
    assertionNot('foo')->null();
})->throwsNoExceptions();

it('fails with assertion is not null', function (): void {
    assertionNot(null)->null();
})->throws(
    InvalidAssertionException::class,
    "Expected a value other than null"
);
