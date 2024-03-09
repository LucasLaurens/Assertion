<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes with assertion must be an array', function (): void {
    assertion([1, 2, 3])->mustBeArray();
})->throwsNoExceptions();

it('fails with assertion must be an array', function (): void {
    assertion('foo')->mustBeArray();
})->throws(
    InvalidAssertionException::class,
    "Expected array value type. Got: string"
);

it('passes with assertion must not be an array', function (): void {
    assertionNot('foo')->mustBeArray();
})->throwsNoExceptions();

it('fails with assertion must not be an array', function (): void {
    assertionNot([1, 2, 3])->mustBeArray();
})->throws(
    InvalidAssertionException::class,
    "Expected an other value type than array"
);
