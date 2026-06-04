<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes with an anonymous function', function (): void {
    assertion((fn () => null))->callable();
})->throwsNoExceptions();

it('fails with a string', function (): void {
    assertion('foo')->callable();
})->throws(
    InvalidAssertionException::class,
    "Expected a callable. Got: string"
);

it('passes with a string', function (): void {
    assertionNot('foo')->callable();
})->throwsNoExceptions();

it('fails with an anonymous function', function (): void {
    assertionNot((fn () => null))->callable();
})->throws(
    InvalidAssertionException::class,
    "Expected a non callable value"
);
