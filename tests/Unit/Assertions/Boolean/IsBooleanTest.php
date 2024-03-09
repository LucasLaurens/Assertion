<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes with true is a boolean', function (): void {
    assertion(true)->boolean();
})->throwsNoExceptions();

it('passes with false is a boolean', function (): void {
    assertion(false)->boolean();
})->throwsNoExceptions();

it('fails with assertion is a boolean', function (): void {
    assertion('foo')->boolean();
})->throws(
    InvalidAssertionException::class,
    "Expected bool value type. Got: string"
);

it('passes with assertion is not a boolean', function (): void {
    assertionNot('foo')->boolean();
})->throwsNoExceptions();

it('fails with true is not a boolean', function (): void {
    assertionNot(true)->boolean();
})->throws(
    InvalidAssertionException::class,
    "Expected an other value type than bool"
);

it('fails with false is not a boolean', function (): void {
    assertionNot(false)->boolean();
})->throws(
    InvalidAssertionException::class,
    "Expected an other value type than bool"
);
