<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes with true', function (): void {
    assertion(true)->true();
})->throwsNoExceptions();

it('passes with equality', function (): void {
    assertion(2 === (1 + 1))->true();
})->throwsNoExceptions();

it('fails with string assertion', function (): void {
    assertion('foo')->true();
})->throws(
    InvalidAssertionException::class,
    "Expected a value to be true. Got: string"
);

it('passes with assertion is not true', function (): void {
    assertionNot('foo')->true();
})->throwsNoExceptions();

it('fails with true assertion', function (): void {
    assertionNot(true)->true();
})->throws(
    InvalidAssertionException::class,
    "Expected a value not to be true"
);
