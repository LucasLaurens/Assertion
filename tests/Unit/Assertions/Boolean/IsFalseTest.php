<?php

declare(strict_types=1);

use LucasLaurens\Assertion\Exceptions\InvalidAssertionException;

use function LucasLaurens\Assertion\{assertion, assertionNot};

it('passes with false', function (): void {
    assertion(false)->false();
})->throwsNoExceptions();

it('passes with inequality', function (): void {
    assertion(2 === 1)->false();
})->throwsNoExceptions();

it('fails with is string assertion', function (): void {
    assertion(is_string('foo'))->false();
})->throws(
    InvalidAssertionException::class,
    "Expected a value to be false. Got: true"
);

it('passes with assertion is string', function (): void {
    assertionNot(is_string('foo'))->false();
})->throwsNoExceptions();

it('fails with false assertion', function (): void {
    assertionNot(false)->false();
})->throws(
    InvalidAssertionException::class,
    "Expected a value not to be false"
);
