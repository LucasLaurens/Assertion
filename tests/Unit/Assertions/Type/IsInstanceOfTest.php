<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes with assertion is instance of stdClass', function (): void {
    assertion(new stdClass())->instanceOf(stdClass::class);
})->throwsNoExceptions();

it('fails with assertion is instance of stdClass', function (): void {
    assertion('foo')->instanceOf(stdClass::class);
})->throws(
    InvalidAssertionException::class,
    "Expected stdClass class. Got: string"
);

it('passes with assertion is not an instance of stdClass', function (): void {
    assertionNot('foo')->instanceOf(stdClass::class);
})->throwsNoExceptions();

it('fails with assertion is not an instance of stdClass', function (): void {
    assertionNot(new stdClass())->instanceOf(stdClass::class);
})->throws(
    InvalidAssertionException::class,
    "Expected an instance other than stdClass"
);
